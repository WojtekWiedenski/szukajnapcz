<?php

use Illuminate\Database\Seeder;
use App\Object;
use App\User;

class ObjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	/* Rektorat */	
        $object = new Object();
    	$object->type = 'rektorat';
    	$object->name = 'Rektorat Politechniki Częstochowskiej';
    	$object->description = 'Publiczna uczelnia o profilu technicznym w Częstochowie, utworzona w 1949 roku. Prowadzi działalność naukową i badawczą w sześciu wydziałach, na 18 kierunkach.';
    	$object->url = 'http://www.pcz.pl';
    	$object->adress = 'Generała Jana Henryka Dąbrowskiego 69, 42-201 Częstochowa';
    	$object->lat = '19.111671653967278';
		$object->lng = '50.82110662766299';
		$object->user_id = '2';
		$object->save();

		/* Wydzialy */	
		$object = new Object();
    	$object->type = 'wydzialy';
    	$object->name = 'Wydział Budownictwa';
    	$object->description = 'Pierwsze wysiłki związane z utworzeniem w Politechnice Częstochowskiej kształcenia studentów w zakresie Budownictwa miała miejsce w 1962 roku.';
    	$object->url = 'http://www.bud.pcz.czest.pl/';
    	$object->adress = 'ul. Akademicka 3, 42-200 Częstochowa';
    	$object->lat = '19.111671653967278';
		$object->lng = '50.82110662766299';
		$object->user_id = '2';
		$object->save();

		$object = new Object();
    	$object->type = 'wydzialy';
    	$object->name = 'Wydział Inżynierii Mechanicznej i Informatyki';
    	$object->description = 'Pierwsze wysiłki związane z utworzeniem w Politechnice Częstochowskiej kształcenia studentów w zakresie Budownictwa miała miejsce w 1962 roku.';
    	$object->url = 'http://www.bud.pcz.czest.pl/';
    	$object->adress = 'ul. Akademicka 3, 42-200 Częstochowa';
    	$object->lat = '19.111671653967278';
		$object->lng = '50.82110662766299';
		$object->user_id = '2';
		$object->save();

        $object = new Object();
        $object->type = 'wydzialy';
        $object->name = 'Wydział Inżynierii Mechanicznej i Informatyki';
        $object->description = 'Pierwsze wysiłki związane z utworzeniem w Politechnice Częstochowskiej kształcenia studentów w zakresie Budownictwa miała miejsce w 1962 roku.';
        $object->url = 'http://www.bud.pcz.czest.pl/';
        $object->adress = 'ul. Akademicka 3, 42-200 Częstochowa';
        $object->lat = '19.111671653967278';
        $object->lng = '50.82110662766299';
        $object->user_id = '2';
        $object->save();

        $object = new Object();
        $object->type = 'wydzialy';
        $object->name = 'Wydział Inżynierii Mechanicznej i Informatyki';
        $object->description = 'Pierwsze wysiłki związane z utworzeniem w Politechnice Częstochowskiej kształcenia studentów w zakresie Budownictwa miała miejsce w 1962 roku.';
        $object->url = 'http://www.bud.pcz.czest.pl/';
        $object->adress = 'ul. Akademicka 3, 42-200 Częstochowa';
        $object->lat = '19.111671653967278';
        $object->lng = '50.82110662766299';
        $object->user_id = '2';
        $object->save();

    }
}
