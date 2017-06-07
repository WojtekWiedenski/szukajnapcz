<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Trader extends Controller_Template {

	public $template = "_trader_template";
	
	public function before()
    {
		$this->template = "_trader_template";
		if (Auth::instance()->logged_in("admin"))
			$this->template = "_admin_template";
		
		parent::before();	 
		
		if ( ! Auth::instance()->logged_in("trader"))
		{
			$action = $this->request->action();
			
			if (! Auth::instance()->logged_in("admin"))
			{
				Controller::redirect('user/login');									
			}	
		}
    }

	public function action_reviews()
	{
		$this->template->page = "reviews";
		$reviews = View::factory('trader/index');
		
		$calendars = ORM::factory("CalendarType")->find_all();
		$calendars_list = array();
		foreach($calendars as $key => $value)
		{
			$active = "aktywny";
			if ($value->active == "0")
				$active = "nieaktywny";	
			$calendars_list[] = array($value->id ,$value->name, $active);
		}
		$reviews->calendars = $calendars_list;
		
		$this->template->content = $reviews;		
		
	}
		
	public function action_configuration()
	{
		$error = "";
		if (HTTP_Request::POST == $this->request->method())
		{
			$name = $this->request->post('name');
			$surname = $this->request->post('surname');
			$password = $this->request->post('password');
			$password2 = $this->request->post('password_2');
			if ($password != $password2)
			{
				$error="Hasła nie są zgodne";
			}
			else
			{
				if ($user = Auth::instance()->get_user())
				{
					$user->name = $name;
					$user->surname = $surname;
					$user->password = $password;
					$user->save();
				}
			}
		}
	
	
		$this->template->page = "configuration";
		
		$configuration_view = View::factory('trader/configuration');
		
		if ($user = Auth::instance()->get_user())
		{
			$configuration_view->name = $user->name;
			$configuration_view->surname = $user->surname;
		}
		if ($error != "")
		{
			$configuration_view->error = $error;
		}
		
		$this->template->content = $configuration_view;
		
	}
	
	public function action_accept()
	{
		$calendar_id =  $this->request->param('id');
		$entry_id = $this->request->query('eid');
		
		$reservation = ORM::factory("Calendars", $entry_id);  
		$reservation->status="verified";
		$reservation->save();
		
		$day_of_week = DateTime::createFromFormat("Y-m-d H:i:s" , $reservation->reservation, new DateTimeZone('UTC'));		
		Controller::redirect('trader/review/'.$calendar_id."?d=".date_format($day_of_week, "Y-m-d"));	
	}
	
	public function action_remove()
	{
		$calendar_id =  $this->request->param('id');
		$entry_id = $this->request->query('eid');
		
		$reservation = ORM::factory("Calendars", $entry_id);  
		$day_of_week = DateTime::createFromFormat("Y-m-d H:i:s" , $reservation->reservation, new DateTimeZone('UTC'));		
		
		$reservation->delete();
		
		Controller::redirect('trader/review/'.$calendar_id."?d=".date_format($day_of_week, "Y-m-d"));		
	}
	
	
	public function action_day()
	{
		$this->auto_render = FALSE;
		
		$calendar_id = $this->request->query('c_id');
		$date = $this->request->query('day');
		
		$reservations = ORM::factory("Calendars")->where("calendar_type_id", "=", $calendar_id)->and_where("reservation", 'BETWEEN',  DB::expr("'$date 00:00:00' AND '$date 23:59:59'"))->order_by('reservation')->find_all();  

		$day_content = View::factory('trader/day');
		$day_content->entries = $reservations;
		$day_content->calendar_id = $calendar_id;
		
		$this->response->body($day_content);
	}
	
	public function action_information()
	{
		$this->auto_render = false;
		
		$calendar_id = $this->request->query('c_id');
		
		if ($this->request->query('day')) // date
		{
			$date = $this->request->query('day');
		}
		else
		{
			$day_of_week = new DateTime();
			$date = date_format($day_of_week, "Y-m-d");	
		}
		
		$information = ORM::factory("Calendars")->get_open_and_close_time($date, $calendar_id);
		
		$information_view = View::factory('trader/information');
		$information_view->information = $information;
		$this->response->body($information_view);
	}
	
	public function action_review()
	{
		$this->template->page = "reviews";
		$calendar_id = $this->request->param('id');
		
		if ($this->request->query('d')) // date
		{
			$date = $this->request->query('d');
		}
		else
		{
			$day_of_week = new DateTime();
			$date = date_format($day_of_week, "Y-m-d");	
		}
		
		$reservations = ORM::factory("Calendars")->where("calendar_type_id", "=", $calendar_id)->and_where("reservation", 'BETWEEN',  DB::expr("'$date 00:00:00' AND '$date 23:59:59'"))->order_by('reservation')->find_all();  

		$day_content = View::factory('trader/day');
		$day_content->entries = $reservations;
		$day_content->calendar_id = $calendar_id;
				
				
		$reservation = View::factory('trader/review');
		$calendar_type = ORM::factory("CalendarType", $calendar_id);  
		 
		$reservation->calendar_name = $calendar_type->name;
		$reservation->reservations = $day_content;
		$reservation->calendar_id = $calendar_id;
		$reservation->selected_date = $date;
		
		$reservation->information = ORM::factory("Calendars")->get_open_and_close_time($date, $calendar_id);
		
		
		$this->template->content = $reservation;
	}
	
	public function action_save()
	{
		$calendar_id =  $this->request->param('id');
		$entry_id = $this->request->post('eid');
		
		$reservation = ORM::factory("Calendars", $entry_id);  
		$full_date = $reservation->reservation;
		$reservation->status="verified";
		$reservation->reservation=$this->request->post("selected_date");
		$reservation->comment=$this->request->post("comments");
	
		$reservation->save();
		
		$date = DateTime::createFromFormat("Y-m-d H:i:s" , $full_date, new DateTimeZone('UTC'));
		
		Controller::redirect('trader/review/'.$calendar_id."?d=".date_format($date, "Y-m-d"));	
	}
	
	public function action_edit()
	{
		$this->template->page = "reviews";
		
		$calendar_id =  $this->request->param('id');
		$entry_id = $this->request->query('eid');
		
		$reservation = ORM::factory("Calendars", $entry_id);  
		$day_of_week = DateTime::createFromFormat("Y-m-d H:i:s" , $reservation->reservation, new DateTimeZone('UTC'));
		
		$client = ORM::factory("Client", $reservation->client_id);  
		
		$reservations_sheet = ORM::factory("Calendars")->create_entries_for_week($calendar_id, date_format($day_of_week, "Y-m-d"));
		
		$week = 0;
		$time_sheet_view = View::factory('common/time_sheet');
		$time_sheet_view->reservations_sheet = $reservations_sheet;
		$time_sheet_view->week_offset = $week;
		$time_sheet_view->calendar_id = $calendar_id;
		
		
		$edit_view = View::factory('trader/edit_reservation');
		$edit_view->day = $reservation->reservation;
		$edit_view->calendar_id = $calendar_id;
		$edit_view->client = $client;
		$edit_view->comment = $reservation->comment;
		$edit_view->status = $reservation->status;
		$edit_view->entry_id = $entry_id;
		$edit_view->time_sheet = $time_sheet_view;
		$edit_view->selected_date = $reservation->reservation;
		$edit_view->week_offset = '0';
		$edit_view->back_url="/trader/review/".$calendar_id."?d=".date_format($day_of_week, "Y-m-d");
		
		$this->template->content = $edit_view;	
	}

		//$date "Y-m-d" $start_time "H:i:s" $end_time "H:i:s"
	private function get_entries_by_date($calendar_id, $date, $start_time, $end_time, $event_time)
	{
		$format = "Y-m-d H:i:s";
		$time_format = "H:i";
		$start_date = DateTime::createFromFormat($format, $date." ".$start_time, new DateTimeZone('UTC'));
		$end_date = DateTime::createFromFormat($format, $date." ".$end_time, new DateTimeZone('UTC'));
		
		//create all entries for day
		$entries = array();
		while($start_date < $end_date)
		{
			
			$entries[] = date_format($start_date, $format);		
			$start_date->add(DateInterval::createFromDateString($event_time.' minutes'));
		}
		
		//entries from db
		$entries_from_db = ORM::factory("Calendars")->where("calendar_type_id", "=", $calendar_id)->and_where("reservation", 'BETWEEN',  DB::expr("'$date $start_time' AND '$date $end_time'"))->find_all();  
		$entries_reserved = array();
		foreach($entries_from_db as $entry)
		{
			
			$entries_reserved[] = $entry->reservation;
		}
		
		//create final list
		$final_entries = array();
		foreach ($entries as $entry)
		{
			$full_date = DateTime::createFromFormat($format, $entry, new DateTimeZone('UTC'));
			$time = date_format($full_date, $time_format);		
			if (!in_array($entry, $entries_reserved))
			{
				$date_time = date_format($full_date, $format);		
				$final_entries[] = array($time, $date_time);
			}		
			else			
			{
				$final_entries[] = array($time, "");
			}
		}
		
		
		
		
		return $final_entries;
	}
	
	//$date - any day of week
	private function create_entries_for_week($calendar_id, $any_day_of_week)
	{
		//$entries = array();
		$day_number = Date('N') - 1;	
		//create monday
		$day_of_week = DateTime::createFromFormat("Y-m-d H:i:s" , $any_day_of_week." 07:00:00", new DateTimeZone('UTC'));
		$day_of_week->sub(DateInterval::createFromDateString($day_number.' days'));
		
		$reservations_sheet = array();
		$days = array("Poniedziałek", "Wtorek", "Środa", "Czwartek", "Piatek", "Sobota", "Niedziela");
		for ($i=0; $i<6; $i++)
		{
			$reservations_sheet[] = array($days[$i]."<br>".date_format($day_of_week,"Y-m-d"),
										  $this->get_entries_by_date($calendar_id, date_format($day_of_week,"Y-m-d"), "10:00:00", "18:00:00", "20"));
			$day_of_week->add(DateInterval::createFromDateString('1 days'));
		}
	
		
		return $reservations_sheet;
	}

} // End Welcome
