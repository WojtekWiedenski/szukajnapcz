<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Path extends Model
{
	
    protected $fillable = [
    	'clat0','clng0',
    	'clat1','clng1',
    	'clat2','clng2',
    	'clat3','clng3',
    	'clat4','clng4',
    	'clat5','clng5',
    	'clat6','clng6',
    	'clat7','clng7'
    ];
    

    public function object()
    {
        return $this->belongsTo('App\Object');
    }
}
