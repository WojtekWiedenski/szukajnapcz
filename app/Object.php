<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Object extends Model
{

    use Searchable;

	//dozwolone atrybuty do edycji przez użytkownika
    protected $fillable = [
    	'name',
    	'description',
    	'type',
    	'adress',
    	'url',
    	'lat',
    	'lng',
        'photo_id',
        'clat0','clng0',
        'clat1','clng1',
        'clat2','clng2',
        'clat3','clng3',
        'clat4','clng4',
        'clat5','clng5',
        'clat6','clng6',
        'clat7','clng7'
    ];

    /*Objekt ma swojego tworce */
    public function user()
    {
        //belongsTo - nalezydo
        return  $this->belongsTo('App\User');
    }

    /*Obiekt jest przypisany do wielu pokoi*/
    public function rooms()
    {
    	//return $this->belongToMany('App\Room')->withTimestamps();
        return $this->hasMany('App\Room');
    }

    public function photo(){

        return $this->belongsTo('App\Photo');
    }
    /*Sciezka jest polaczona z jednym obiektem */
    public function path(){
        return $this->hasOne('App\Path', 'object_id', 'id');
    }
}
