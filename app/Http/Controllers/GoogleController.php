<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use PhpParser\Node\Stmt\TryCatch;
use Throwable;

class GoogleController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function callback(){
        
        try {
            $user = Socialite::driver('google')->stateless()->user();
            //dd($user);
            $finduser = User::where('google_id', $user->getId())->first();
            if($finduser) {
                Auth::login($finduser);
                return redirect()->intended('/');
            } else {
                $newUser = User::create([
                    'name' => $user->getName(),
                    'username' => $user->getEmail(),
                    'email' => $user->getEmail(),
                    'google_id' => $user->getId(),
                    'password' => bcrypt('12345678'),
                ]);

                Auth::login($newUser);
                return redirect()->intended('/home');
            }


        } catch (\Throwable $th) {
            
        }
    } 
    
}
