<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password',
        'created_at',
        'role',
        'avatar_url',
        'first_name',
        'last_name',
        'provider',
        'provider_id',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*
    Uzytkownik jest autorem roznych objektow 
    Relacja jeden do wielu 
    */
    public function objects()
    {
        return $this->hasMany('App\Object');
    }


    /*
    Uzytkownik jest autorem roznych postow 
    Relacja jeden do wielu 
    */
    public function posts(){

        return $this->hasMany('App\Post');

    }

    /*
    Uzytkownik jest autorem roznych pokoi, sal itd. (rooms)
    Relacja jeden do wielu 
    */
    public function rooms()
    {
        return $this->hasMany('App\Room');
    }


    public function roles(){
        return $this->belongsToMany('App\Role', 'user_role');
    }

    
     /**
      * Dowiedz się, czy użytkownik ma jakąkolwiek rolę
      * zwraca boolean
      */
     public function isEmployee()
     {
         $roles = $this->roles->toArray();
         return !empty($roles);
     }

     /**
      * Dowiedz się czy użytkownik ma specyficzną rolę
      * zwraca boolean
      */
     public function hasRole($check)
     {
         return in_array($check, array_fetch($this->roles->toArray(), 'name'));
     }


     /**
      * Pobierz klucz tablicy z odpowiednią wartością
      * @return int
      */
     private function getIdInArray($array, $term)
     {
         foreach ($array as $key => $value) {
             if ($value == $term) {
                 return $key;
             }
         }
 
         throw new UnexpectedValueException;
     }


     /**
      * Dodawanie ról do użytkownika, aby zapewnić im concierge
      */
     public function makeEmployee($title)
     {
         $assigned_roles = array();
 
         $roles = array_fetch(Role::all()->toArray(), 'name');
 
         switch ($title) {
             case 'admin':
                 $assigned_roles[] = $this->getIdInArray($roles, 'edit_object');
                 $assigned_roles[] = $this->getIdInArray($roles, 'create_object');
             case 'editor':
                 $assigned_roles[] = $this->getIdInArray($roles, 'edit_object');
             case 'user':
                 $assigned_roles[] = $this->getIdInArray($roles, 'add_points');
                 $assigned_roles[] = $this->getIdInArray($roles, 'redeem_points');
                 break;
             default:
                 throw new \Exception("The employee status entered does not exist");
         }
 
         $this->roles()->attach($assigned_roles);
     }


}
