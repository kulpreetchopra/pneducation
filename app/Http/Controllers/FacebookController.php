<?php


namespace App\Http\Controllers;


use App\User;
use App\Cart;
use App\Http\Controllers\Controller;
use Socialite;
use Exception;
use Auth;
class FacebookController extends Controller
{/**
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
            }

            else{
                $newUser = User::create([
                    'fname' => $user->name,
                    'email' => $user->email,
                    'facebook_id'=> $user->id,
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
