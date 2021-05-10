<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\User;
  
class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
    
            $user = Socialite::driver('google')->stateless()->user();
     
            $finduser = User::where('google_id', $user->id)->first();
     
            if($finduser){
     
                Auth::login($finduser);
    
                return redirect('/addtocart');
     
            }else{
                $newUser = User::create([
                    'fname' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('Superman_test')
                ]);
    
                Auth::login($newUser);
     
                return redirect('/addtocart');
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}