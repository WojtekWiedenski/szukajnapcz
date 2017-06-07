<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin extends Controller_Template {

	public $template = "_admin_template";
	
	public function before()
    {
		parent::before();
        if ( ! Auth::instance()->logged_in("admin") )
        {
			Controller::redirect('user/login');
        }
    }

	public function action_index()
	{
		Controller::redirect('admin/traders');
	}
	
	public function action_trader()
	{

		$this->template->page = "traders";
		
		$user_id = $this->request->param('id');
		$user = ORM::factory('User', $user_id);
		
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
				if ($user->loaded())
				{
					$user->name = $name;
					$user->surname = $surname;			
					$user->password = $password;			
					
					$user->save();	
				}			
			}
		}
	

		$trader_view = View::factory('admin/trader');
		if ($error != "")
		{
			$trader_view->error = $error;
		}
		$trader_view->name = $user->name;
		$trader_view->surname = $user->surname;
		$trader_view->user_id = $user_id;

		$this->template->content = $trader_view;
	}

	public function action_addtrader()
	{
		$email = $this->request->post('email');
		$name = $this->request->post('name');
		$surname = $this->request->post('surname');
			
		$user = ORM::factory('User');
		$user->username = $email;
		$user->email = $email;
		$user->name = $name;
		$user->surname = $surname;
		$user->password = $email;
		$user->save();
		
		$user->add('roles', ORM::factory("Role","1"/*login*/)); 
		$user->add('roles', ORM::factory("Role","3"/*trader*/)); 
		
		Controller::redirect('admin/traders');	
	}
	
	public function action_traders() 
	{
		$this->template->page = "traders";
		$content = View::factory('admin/traders');
		
		//1 - trader handloweic
		$traders = ORM::factory("Role","3")->users->find_all();
		$traders_list = array();
		foreach($traders as $key => $value)
		{
			$traders_list[] = array($value->id, $value->email, $value->name, $value->surname);
		}
		$content->traders = $traders_list;
		
		$this->template->content = $content;
	}
	
	public function action_calendars() 
	{
		$this->template->page = "calendars";
		$content = View::factory('admin/calendars');
				
		$calendars = ORM::factory("CalendarType")->find_all();
		$calendars_list = array();
		foreach($calendars as $key => $value)
		{
			$active = "aktywny";
			if ($value->active == "0")
				$active = "nieaktywny";	
			$calendars_list[] = array($value->id ,$value->name, $active);
		}
		$content->calendars = $calendars_list;
		
		
		$this->template->content = $content;
	}
	
		
	
	
	/* $times:
		[$weekday] => Array
        (
			[open_time] => 18:30:00
            [close_time] => 16:30:00
			[close] => 'on'
        )
		*/
	private function save_calendar_times($times, $calendar_id)
	{
		foreach($times as $week_day => $time)
		{
			//time must be remove
			if (array_key_exists('2', $time)) // 
			{
				$item = ORM::factory("WorkTimes")->where("calendar_type_id", "=", $calendar_id)->and_where('week_day',"=", $week_day)->find();
				if ($item->loaded())	
				{
					$item->delete();
				}
				continue;
			}
			
			$item = ORM::factory("WorkTimes")->where("calendar_type_id", "=", $calendar_id)->and_where('week_day',"=", $week_day)->find();
			if ($item->loaded())
			{
				$item->open_time = $time[0];
				$item->close_time = $time[1];
				
			}
			else
			{
				$item = ORM::factory("WorkTimes");
				$item->calendar_type_id = $calendar_id;
				$item->week_day = $week_day;
				$item->open_time = $time[0];
				$item->close_time = $time[1];
			}
			
			$item->save();
		}
		
	}
	
	private function save_calendar_close_days($dates, $calendar_id)
	{
		foreach ($dates as $key => $dt)
		{
			if (array_key_exists('remove', $dt))
			{
				//remove
				$id = $dt['remove'];
				$restriction = ORM::factory("CloseDays", $id);
				$restriction->delete();
				
			}
			else if (array_key_exists('id', $dt))
			{
				//update
				$id = $dt['id'];
				$dt_from = DateTime::createFromFormat("Y-m-d" , $dt['from'], new DateTimeZone('UTC'));
				$dt_to = DateTime::createFromFormat("Y-m-d" , $dt['to'], new DateTimeZone('UTC'));
				
				$restriction = ORM::factory("CloseDays", $id);
				
				$restriction->close_from = date_format($dt_from,"Y-m-d");
				$restriction->close_to = date_format($dt_to,"Y-m-d");
				$restriction->save();	
			}
			else
			{
				//add
				
				$dt_from = DateTime::createFromFormat("Y-m-d" , $dt['from'], new DateTimeZone('UTC'));
				$dt_to = DateTime::createFromFormat("Y-m-d" , $dt['to'], new DateTimeZone('UTC'));
				
				
				$restriction = ORM::factory("CloseDays");
				$restriction->calendar_type_id = $calendar_id;
				$restriction->close_from = date_format($dt_from,"Y-m-d");
				$restriction->close_to = date_format($dt_to,"Y-m-d");
				$restriction->save();	
			}
			
			
		}
	}
	
	private function save_calendar_special_days($special_times, $calendar_id)
	{
		foreach ($special_times as $key => $dt)
		{
			if (array_key_exists('remove', $dt))
			{
				//remove
				$id = $dt['remove'];
				$restriction = ORM::factory("SpecialTimes", $id);
				$restriction->delete();
				
			}
			else if (array_key_exists('id', $dt))
			{
				//update
				$id = $dt['id'];
				$date = DateTime::createFromFormat("Y-m-d" , $dt['date'], new DateTimeZone('UTC'));
				$open_time = $dt['from'];
				$close_time = $dt['to'];
				
				$restriction = ORM::factory("SpecialTimes", $id);
				$restriction->date = date_format($date, "Y-m-d");
				$restriction->open_time = $open_time;
				$restriction->close_time = $close_time;
				$restriction->save();	
			}
			else
			{
				//add
				
				$date = DateTime::createFromFormat("Y-m-d" , $dt['date'], new DateTimeZone('UTC'));
				$open_time = $dt['from'];
				$close_time = $dt['to'];
				
				
				$restriction = ORM::factory("SpecialTimes");
				$restriction->calendar_type_id = $calendar_id;
				$restriction->date = date_format($date,"Y-m-d");
				$restriction->open_time = $open_time;
				$restriction->close_time = $close_time;
				$restriction->save();	
			}
			
			
		}
	}
	 
	public function action_calendar() 
	{
		$calendar_id = $this->request->param('id');
		
		if (HTTP_Request::POST == $this->request->method())
		{
			$times = $this->request->post('times');
			$dates = $this->request->post('date');
			$special_times = $this->request->post('s_time');
			$interval = $this->request->post('interval');
			$this->save_calendar_times($times, $calendar_id);
			if ($dates)
				$this->save_calendar_close_days($dates, $calendar_id);
			if ($special_times)
				$this->save_calendar_special_days($special_times, $calendar_id);
			
			
			$calendar_type = ORM::factory("CalendarType", $calendar_id);
			$calendar_type->interval = $interval;
			$calendar_type->save();
			
			ORM::factory("Calendars")->validate_reservations($calendar_id);
			
			Controller::redirect('admin/calendar/'.$calendar_id);	
			return;
		}
				
		$this->template->page = "calendars";
		
		//Work times
		$calendar_type = ORM::factory("CalendarType", $calendar_id);
		$work_times = ORM::factory("WorkTimes")->where("calendar_type_id", "=", $calendar_id)->find_all();
		$times = array();
		foreach($work_times as $key => $value)
		{
			$times[$value->week_day] = array($value->open_time, $value->close_time);
		}
			
		//Close days
		$close_days = ORM::factory("CloseDays")->where("calendar_type_id", "=", $calendar_id)->order_by("close_from")->find_all();
		$days_off = array();
		foreach($close_days as $key => $value)
		{
			$days_off[$value->id] = array($value->close_from, $value->close_to);
		}
		
		//Special times
		$special_times = ORM::factory("SpecialTimes")->where("calendar_type_id", "=", $calendar_id)->order_by("date")->find_all();
			
		$content = View::factory('admin/calendar');
		$content->calendar_id = $calendar_id;
		$content->calendar_name = $calendar_type->name;
		$content->times = $times;
		$content->days_off = $days_off;
		$content->special_times = $special_times;
		$content->interval = $calendar_type->interval;
		
		
		$this->template->content = $content;
	}
	
	
	public function action_createcalendar()
	{
		$this->template->page = "calendars";
		$new_calendar = ORM::factory("CalendarType");
		$new_calendar->name = $this->request->post('name');
		if ($this->request->post('active'))
			$new_calendar->active = '1';
		else
			$new_calendar->active = '0';
		
		$new_calendar->interval = '30';
		$new_id = $new_calendar->save();
		
		//add default work times
		//from monday to saturday
		for($day =1; $day<7; $day++)
		{
			$work_day = ORM::factory("WorkTimes");
			$work_day->calendar_type_id = $new_id;
			$work_day->week_day = $day;
			$work_day->open_time = "8:30";
			$work_day->close_time = "16:30";
			$work_day->save();
		}
	
		Controller::redirect('admin/calendar/'.$new_id);	
	}
	
	public function action_removetrader()
	{
		if (HTTP_Request::POST == $this->request->method())
		{
			$trader_id = $this->request->post('r_id');
			$user = ORM::factory("User", $trader_id);
			$user->delete();
			Controller::redirect('admin/traders');
		}
		$this->template->page = "traders";
		$content = View::factory('admin/remove_trader');
		
		$trader_id = $this->request->param('id');
		$user = ORM::factory("User", $trader_id);
		
		$content->trader_name = $user->name;		
		$content->trader_id = $trader_id;
		$this->template->content = $content;
	}
		
	public function action_removecalendar()
	{
		if (HTTP_Request::POST == $this->request->method())
		{
			$calendar_id = $this->request->post('r_id');
			DB::delete('calendar_types')->where('id', '=', $calendar_id)->execute();		
			Controller::redirect('admin/calendars');
		}
		$this->template->page = "calendars";
		$content = View::factory('admin/remove_calendar');
		
		$calendar_id = $this->request->param('id');
		$calendar_type = ORM::factory("CalendarType", $calendar_id);
		
		$content->calendar_name = $calendar_type->name;		
		$content->calendar_id = $calendar_id;
		$this->template->content = $content;
	}
	
	
	
	public function action_reviews()
	{
		$this->template->page = "reviews";
		$review = View::factory('admin/reviews');
		
		$calendars = ORM::factory("CalendarType")->find_all();
		$calendars_list = array();
		foreach($calendars as $key => $value)
		{
			$active = "aktywny";
			if ($value->active == "0")
				$active = "nieaktywny";	
			$calendars_list[] = array($value->id ,$value->name, $active);
		}
		$review->calendars = $calendars_list;
		
		$this->template->content = $review;		
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
	

	public function action_account()
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
	
		$this->template->page = "account";
		
		$account_view = View::factory('admin/account');
		
		if ($user = Auth::instance()->get_user())
		{
			$account_view->name = $user->name;
			$account_view->surname = $user->surname;
		}
		if ($error != "")
		{
			$account_view->error = $error;
		}
		
		$this->template->content = $account_view;	
	}
	
		
	public function action_configuration()
	{
		
		$this->template->page = "configuration";
		
		if (HTTP_Request::POST == $this->request->method())
		{
			$c_data = ORM::factory("Configuration", "0");			
			if (!$c_data->loaded())
			{
				$c_data = ORM::factory("Configuration");			
				$c_data->id = '0';
			}
			$c_data->service_name =  $this->request->post('name');
			$c_data->main_page_description =  $this->request->post('description');
			$c_data->save();	
		}
		
		$configuration = View::factory('admin/configuration');
		
		$c_data = ORM::factory("Configuration", "0");	
		if ($c_data->loaded())
		{
			$configuration->name = $c_data->service_name;
			$configuration->description = $c_data->main_page_description;	
			
		}
		else
		{
			$configuration->name = "SamSerwis";
			$configuration->description = "<h1>Witamy</h1>";
		}
	
	
	
		
		$this->template->content = $configuration;		
	}

} // End Welcome
