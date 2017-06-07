<?php

use Illuminate\Database\Seeder;

class GeneratorObiektowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker\Factory::create();

        foreach(range(1,50) as $index){
        	DB::table('objects')->insert([
        		'type' => $faker->randomElement(array('domy-studenckie', 'wydzialy', 'punkty-gastronomiczne', 'rozrywka', 'przystanki-tramwajowe', 'przystanki-autobusowe', 'biblioteki')),
		    	'name' => $faker->lastName,
		    	'description' => $faker->sentence(10),
		    	'url' => $faker->sentence(3),
		    	'adress' => $faker->country,
		    	'lat' => $faker->numberBetween(19.102702347021477,19.124245849829094),
		    	'lng' => $faker->numberBetween(50.826664154816534,50.818368285668164),
		    	'user_id' => 2
        	]);
        }
    }
}
