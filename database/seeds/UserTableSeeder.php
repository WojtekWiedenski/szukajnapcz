<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	//$role_user = Role::where('name', 'User')->first();
    	//$role_editor = Role::where('name', 'Editor')->first();
    	//$role_admin = Role::where('name', 'Admin')->first();

    	$user = new User();
 //   	$user->role_id = '1';
    	$user->name = 'User';
    	$user->email = 'user@wp.pl';
    	$user->password = bcrypt('user');
    	$user->first_name = 'Name';
    	$user->last_name = 'Lastname';
    	$user->save();
    //	$user->makeEmployee('user');

        $admin = new User();
//      $admin->role_id = '1';
        $admin->name = 'admin';
        $admin->email = 'admin@wp.pl';
        $admin->password = bcrypt('admin');
        $admin->first_name = 'Name';
        $admin->last_name = 'Lastname';
        $admin->save();
    //  $user->makeEmployee('admin');

    	$editor = new User();
 //   	$editor->role_id = '1';
    	$editor->name = 'editor';
    	$editor->email = 'editor@wp.pl';
    	$editor->password = bcrypt('editor');
    	$editor->first_name = 'Name';
    	$editor->last_name = 'Lastname';
    	$editor->save();
    //	$user->makeEmployee('editor');


    }
}
