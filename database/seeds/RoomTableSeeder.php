<?php

use Illuminate\Database\Seeder;
use App\Room;
use App\User;

class RoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $room = new Room();
        $room->user_id = '2';
        $room->object_id = '3';
        $room->name = '507 - Laboratorium nr. 1';
        $room->short_name = 'IISI';
    	$room->level = '4';
        $room->type = 'Laboratorium';
    	$room->description = 'Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle poligraficznym. Został po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem próbnej książki.';
    	$room->number = '507';	
		$room->save();

        $room = new Room();
        $room->user_id = '2';
        $room->object_id = '3';
        $room->name = '510 - Laboratorium nr. 2';
        $room->level = '4';
        $room->type = 'Laboratorium';
        $room->description = 'Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle poligraficznym. Został po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem próbnej książki.';
        $room->number = '510';    
        $room->save();

        $room = new Room();
        $room->user_id = '2';
        $room->object_id = '3';
        $room->name = '514 - Laboratorium nr. 3';
        $room->level = '4';
        $room->type = 'Laboratorium';
        $room->description = 'Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle poligraficznym. Został po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem próbnej książki.';
        $room->number = '514';    
        $room->save();

        $room = new Room();
        $room->user_id = '2';
        $room->object_id = '3';
        $room->name = '515 - Laboratorium nr. 4';
        $room->level = '4';
        $room->type = 'Laboratorium';
        $room->description = 'Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle poligraficznym. Został po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem próbnej książki.';
        $room->number = '515';    
        $room->save();

        $room = new Room();
        $room->user_id = '2';
        $room->object_id = '3';
        $room->name = '518 - Laboratorium nr. 5';
        $room->level = '4';
        $room->type = 'Laboratorium';
        $room->description = 'Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle poligraficznym. Został po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem próbnej książki.';
        $room->number = '518';    
        $room->save();

        $room = new Room();
        $room->user_id = '2';
        $room->object_id = '3';
        $room->name = '522 - Laboratorium nr. 6';
        $room->level = '4';
        $room->type = 'Laboratorium';
        $room->description = 'Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle poligraficznym. Został po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem próbnej książki.';
        $room->number = '522';   
        $room->save();
		
    }
}
