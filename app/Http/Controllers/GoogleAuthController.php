<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use PhpParser\Node\Stmt\TryCatch;

class GoogleAuthController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')
        ->redirect();
    }
   
    public function callbackGoogle()
{
    try {
        // Retrieve the Google user
        $googleUser = Socialite::driver('google')->user();
        // dd($googleUser);

        // Check if a user exists with the same Google ID
        $user = User::where('google_id', $googleUser->getId())->first();

        if (!$user) {
            // Check if a user exists with the same email
            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                
                // Update the existing user with the Google ID
                $user->update([
                    'google_id' => $googleUser->getId(),
                ]);
            } else {
                // Create a new user if no matching email exists
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt('default_password'), // Optional: Set a random default password
                ]);
            }
        }

        // Log the user in
        Auth::login($user);

        // Redirect to the intended page or home
        return redirect()->intended('/');
    } catch (\Exception $e) {
        // Log\::error('Google Login Error: ' . $e->getMessage());
        return redirect()->route('user.login_form')->with('error', 'Failed to login with Google.');
    }
}

}
