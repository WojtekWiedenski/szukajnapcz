<?php

use App\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        /*
        $user = User::create(
             array(
                  'name' => 'Alex',
                  'last_name'  => 'Sears',
                  'password' => bcrypt('user'),
                  'email' => 'alexsears@gmail.com',
             ));
         $user->makeEmployee('admin');
    */

         
         $this->call(UserTableSeeder::class);
         $this->call(ObjectTableSeeder::class);
         $this->call(RoleTableSeeder::class);
         $this->call(RoomTableSeeder::class);
      //   $this->call(GeneratorObiektowSeeder::class);
    }
}
