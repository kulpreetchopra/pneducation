<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\User;
use App\Cart;
use App\Navbar;
use Session;
use Mail;
use DB;
  
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
     
            }else{
                $newUser = User::create([
                    'fname' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
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
                    $user = User::where('email',$user->email)->first(); 
                    $to = $user->email;
                    $navbar = Navbar::all();
                    $subject = 'User Registered Successful';
                    $message = "Your Registration Is Successful In PnInfosys Course Program \n\n";
                    Mail::send('front.register_email', ['msg' => $message,'user' => $user,'navbar' => $navbar] , function($message) use ($to){ 
                    $message->to($to, 'User')->subject('User Registered');});
                    // echo"false";
                    return redirect("/")->with('message','Login Successfully');
                }
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}