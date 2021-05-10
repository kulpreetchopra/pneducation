<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\User;
  
class LinkedinController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToLinkedin()
    {
        return Socialite::driver('linkedin')->redirect();
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleLinkedinCallback()
    {
        try {
    
            $user = Socialite::driver('linkedin')->stateless()->user();
     
            $finduser = User::where('linkedin_id', $user->id)->first();
     
            if($finduser){
     
                Auth::login($finduser);
    
                return redirect('/addtocart');
     
            }else{
                $newUser = User::create([
                    'fname' => $user->name,
                    'email' => $user->email,
                    'linkedin_id'=> $user->id,
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