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
            // dd($user->getAvatar());

            $is_user = User::where('email', $user->getEmail())->first();
            // dd($is_user);
            if(!$is_user){
                $saveUser = User::updateOrCreate([
                    'github_id' => $user->getId(),
                ],[
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => Hash::make($user->getName().'@'.$user->getId()),
                    'foto_url' => $user->getAvatar()
                ]);
                // POST REQUEST DOEN
                // API URL
                $url = 'https://dartuser-api-st6rnqmhea-uc.a.run.app/addNewPlayer';

                // Create a new cURL resource
                $ch = curl_init($url);

                // Setup request to send json via POST
                $data = array(
                    'id' => $saveUser->id,
                    'name' => $saveUser->name,
                    'best_avg' => '0',
                    'nine_darts' => '0',
                    'highest_finish' => '0',
                    'one_eigthies' => '0',
                    'one_forties' => '0',
                    'one_twenties' => '0',
                    'one_hundreds' => '0',
                    'total_darts' => '0',
                );
                $payload = json_encode($data);
                // dd($payload);
                // Attach encoded JSON string to the POST fields
                curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

                // Set the content type to application/json
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

                // Return response instead of outputting
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                // Execute the POST request
                $result = curl_exec($ch);

                // Close cURL resource
                curl_close($ch);
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
