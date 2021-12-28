<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class GithubController extends Controller
{
    public function loginWithGithub(){
        return Socialite::driver('github')->redirect();
    }

    public function callbackFromGithub(){
        try {
            $user = Socialite::driver('github')->stateless()->user();
            //dd($user);

            $is_user = User::where('email', $user->getEmail())->first();
            //dd($is_user);
            if(!$is_user){
                $saveUser = User::updateOrCreate([
                    'github_id' => $user->getId(),
                ],[
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => Hash::make($user->getName().'@'.$user->getId())
                ]);
            } else{
                $saveUser = User::where('email', $user->getEmail())->update([
                    'github_id' => $user->getId(),
                ]);
                $saveUser = User::where('email', $user->getEmail())->first();
            }
        
            Auth::loginUsingId($saveUser->id);

            return redirect()->route('home');

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
