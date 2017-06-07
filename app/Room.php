<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Room extends Model
{
    use Searchable;
	//dozwolone atrybuty do edycji przez użytkownika
    protected $fillable = [
    	'name',
    	'description',
    	'type',
    	'level',
        'object_id',
        'user_id',
        'photo_id'

    ];

    /*Pomieszczenie ma swojego tworce */
    public function user()
    {
        //belongsTo - nalezydo
        return  $this->belongsTo('App\User');
    }

    public function object()
    {
    	//return $this->belongsToMany('App\Object')->withTimestamps();
        return $this->belongsTo('App\Object');
    
    }

    public function photo(){

        return $this->belongsTo('App\Photo');

    }


}
