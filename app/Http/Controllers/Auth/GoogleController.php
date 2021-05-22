<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\User;
use App\Cart;
  
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

            $cart= Cart::where('user_email',$user->email)->get();
     
            if($finduser){
     
                Auth::login($finduser);
    
                if($cart!='[]'){
                    // echo"true";
                    return redirect("addtocart")->with('message','Login Successfully');
                }
                else{
                    // echo"false";
                    return redirect("/")->with('message','Login Successfully');
                }
     
            }else{
                $newUser = User::create([
                    'fname' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('Superman_test')
                ]);
    
                Auth::login($newUser);
     
                if($cart!='[]'){
                    // echo"true";
                    return redirect("addtocart")->with('message','Login Successfully');
                }
                else{
                    // echo"false";
                    return redirect("/")->with('message','Login Successfully');
                }
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}