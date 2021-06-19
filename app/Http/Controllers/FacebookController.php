<?php


namespace App\Http\Controllers;

use App\User;
use App\Cart;
use App\Navbar;
use App\Http\Controllers\Controller;
use Socialite;
use Exception;
use Auth;
use Session;
use Mail;
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
                Session::put('ashu',$user->id);
                Session::forget('kulpreet');
                DB::table('users')->where(['email'=>$user->email])->update(['active'=>1]);

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
                Session::put('ashu',$user->id);
                Session::forget('kulpreet');
                DB::table('users')->where(['email'=>$user->email])->update(['active'=>1]);
     
                if($cart!='[]'){
                    $user = User::where('email',$user->email)->first(); 
                    $to = $user->email;
                    $navbar = Navbar::all();
                    $subject = 'User Registered Successful';
                    $message = "Your Registration Is Successful In PnInfosys Course Program \n\n";
                    Mail::send('front.register_email', ['msg' => $message,'user' => $user,'navbar' => $navbar] , function($message) use ($to){ 
                    $message->to($to, 'User')->subject('User Registered');});
                    // echo"true";
                    return redirect("addtocart")->with('message','Login Successfully');
                }
                else{
                    // echo"false";
                    $user = User::where('email',$user->email)->first(); 
                    $to = $user->email;
                    $navbar = Navbar::all();
                    $subject = 'User Registered Successful';
                    $message = "Your Registration Is Successful In PnInfosys Course Program \n\n";
                    Mail::send('front.register_email', ['msg' => $message,'user' => $user,'navbar' => $navbar] , function($message) use ($to){ 
                    $message->to($to, 'User')->subject('User Registered');});
                    return redirect("/")->with('message','Login Successfully');
                }
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
