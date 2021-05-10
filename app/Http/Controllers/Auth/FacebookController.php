<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\User;
  
class FacebookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback()
    {
        try {
    
            $user = Socialite::driver('facebook')->stateless()->user();
     
            $finduser = User::where('facebook_id', $user->id)->first();
     
            if($finduser){
     
                Auth::login($finduser);
    
                return redirect('/addtocart');
     
            }else{
                $newUser = User::create([
                    'fname' => $user->name,
                    'email' => $user->email,
                    'facebook_id'=> $user->id,
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