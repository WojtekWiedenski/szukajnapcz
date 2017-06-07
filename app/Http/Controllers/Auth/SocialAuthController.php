<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use App\Role;

class SocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
    	return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        //dd('callback');

        $user = Socialite::driver($provider)->user();

        $authUser=User::firstOrNew(['provider_id'=>$user->id]);

        $authUser->name=$user->name;
        $authUser->email=$user->email;
        $authUser->provider=$provider;

        $authUser->save();

        $authUser->roles()->attach(Role::where('name', 'User')->first());
   //     Auth::login($authUser);
/*
        $authUser=User:where('provider_id',$user->id)->first();
        if($authenticatedUser){
        	$authenticatedUser=$authUser;
        }else{
        	$authenticatedUser=User:create([
        		'name'=>$user->name,
        		'provider_id'=>$User->id,
        		'provider'=>$provider,
        		'email'=>$user->email
        		]);
        }
*/
        auth()->login($authUser);

        return redirect('/');
    }
}
