<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Navbar;
use App\Cart;
use App\Checkout;
use App\Coupan;
use App\Courseorder;
use App\Course_order_product;
use DB;
use Session;
use Auth;
use Mail;

class CartController extends Controller
{
   public function cartsubmit(Request $a)
    {   
    	// print_r($a->all());
        // die;
        $session_id = Session::getId();
        // print_r($session_id);
        // die;
    	$r = new Cart;
        if(Auth::check()){
        $user_email=Auth::User()->email;
        $r->user_email=$user_email;
        }
    	$r->course_id=$a->course_id;
    	$r->course_name=$a->course_name;
    	$r->course_price=$a->course_price;
        $r->image=$a->image;
        $r->session_id=$session_id;
        // print_r($r);
        // die;
    	$r->save();
    	if($r){
    		return redirect('addtocart')->with('message','Added To Cart Successfully');  //reduct rout of url
    	}
    	else{
        	return redirect('allcourse')->with('wmessage','Added To Cart Unsuccessfully');
        }
    }
    public function delete($id)
    {
        echo $id;
        $d=Cart::find($id);
        $delete=$d->delete();
        if($delete){
            return redirect('addtocart')->with('message','Cart Deleted Successfully'); //reduct rout of url
        }
        else{
            return redirect('addtocart')->with('message','Cart Deleted Unsuccessfully'); //reduct rout of url
        }
    }
    public function cart(){
        $navbar = Navbar::all();
        if(Auth::check()){
            $user_email=Auth::User()->email;
            $cart= Cart::where('user_email',$user_email)->get();
        }
        else{
            $session_id = Session::getId();
            // print_r($session_id);
            // die;
            $cart= Cart::where('session_id',$session_id)->get();
        }
        return view("front.addtocart",compact('navbar','cart'));
    } 
    public function coursequantity_update($id=null,$course_quantity=null){
        // echo $id;
        // echo $course_quantity;
        DB::table('carts')->where('id',$id)->increment('course_quantity',$course_quantity);
        return redirect('addtocart')->with('message','Quantity Updated Successfully');;
    }
    public function checkout(){
        $session_id = Session::getId();
        $navbar = Navbar::all();
        $checkout= Checkout::all();
        $coupan = Coupan::all();
        if(Auth::check()){
            $user_email=Auth::User()->email;
            $cart= Cart::where('user_email',$user_email)->get();
        }
        else{
            $session_id = Session::getId();
            // print_r($session_id);
            // die;
            $cart= Cart::where('session_id',$session_id)->get();
        }
        return view("front.checkout",compact('navbar','cart','checkout','coupan'));
    } 

    //checkout
    public function checkoutsubmit(Request $a)
    {
        $this->validate($a,[
        "user_email"=>"required",
        "country"=>"required",
        "address"=>"required",
        "city"=>"required",
        "state"=>"required",
        "pincode"=>"required",
        "phone"=>"required",
        ]);
        $r = new Courseorder;
        $r->user_id=$a->user_id;
        $r->fname=$a->fname;
        $r->lname=$a->lname;
        $r->user_email=$a->user_email;
        $r->country=$a->country;
        $r->address=$a->address;
        $r->city=$a->city;
        $r->state=$a->state;
        $r->pincode=$a->pincode;
        $r->phone=$a->phone;
        $r->order_note=$a->order_note;
        $r->order_status="Pending";
        $order_id= uniqid('PN');
        $r->order_id=$order_id;
        $r->transaction_id=$a->transaction_id;
        $r->payment_methode=$a->payment_methode;
        $r->subtotal=$a->subtotal;
        $r->coupan_code=$a->coupan_code;
        $coupan=DB::table('coupans')->where(['coupan_code'=>$a->coupan_code])->get();
        $coupan;
        foreach($coupan as $c){
            if($r->coupan_code==$c->coupan_code && $c->status=='1' && $r->coupan_code!=NULL){
               $r->coupan_discount=$c->discount; 
               $total=$a->total;
               $r->total=$total-($c->discount/100)*$total;
            }
            else{
               $r->coupan_discount=$a->coupan_discount;  
               $r->total=$a->total;
            }
        }
        if($coupan=='[]'){
            $r->coupan_discount=$a->coupan_discount;  
            $r->total=$a->total;
        }
        $r->save();
        // die;
        //paytm gateway
        $data_for_request = $this->handlePaytmRequest($order_id,$r->total);
        $paytm_txn_url = 'https://securegw-stage.paytm.in/theia/processTransaction';
        $paramList = $data_for_request['paramList'];
        $checksum = $data_for_request['checksum'];

        $order_id=DB::getPdo()->lastinsertID();
        // print_r($order_id);
        // die;
        $cartproduct=DB::table('carts')->where(['user_email'=>$a->user_email])->get();
        foreach($cartproduct as $c){
            $cp= new Course_order_product;
            $cp->course_order_id=$order_id;
            $cp->order_id=$r->order_id;
            $cp->user_id=$a->user_id;
            $cp->user_email=$a->user_email;
            $cp->course_id=$c->course_id;
            $cp->course_name=$c->course_name;
            $cp->course_price=$c->course_price;
            $cp->course_quantity=$c->course_quantity;
            $cp->course_image=$c->image;
            $cp->save();
        }
        // print_r($cartproduct);
        if($r['payment_methode']=="Cash On Dilevery"){
            $user = User::where('email',$a->user_email)->first(); 
            $to = $a->user_email;
            $navbar = Navbar::all();
            $corder = Courseorder::all();
            $corderd = Course_order_product::all();
            $id = $r->id;
            $subject = 'User Order Successful';
            $message = "Your Order Is Successful In PnInfosys Course Program \n\n";
            Mail::send('front.order_email', ['msg' => $message,'navbar' => $navbar,'corder' => $corder,'corderd' => $corderd,'id' => $id, 'user' => $user] , function($message) use ($to){ 
                $message->to($to, 'User')->subject('User Order');  
            }); 
            return redirect('thanks')->with('message','Order Submitted Successfully');  //reduct rout of url
        }
        elseif($r['payment_methode']=="Paytm"){
            return view('front.paytm-merchant-form',compact('paytm_txn_url','paramList','checksum'));
        }
        else{
            return redirect('thanks')->with('wmessage','Order Submitted Unsuccessfully');
        } 
    }

    public function handlePaytmRequest($order_id,$amount){
        $this->getAllEncdecFunc();
        $this->getConfigPaytmSettings();

        $checksum = "";
        $paramList = array();
        $paramList["MID"] = 'eVpbkQ44876418419806';
        $paramList["ORDER_ID"] = $order_id;
        $paramList["CUST_ID"] = $order_id;
        $paramList["INDUSTRY_TYPE_ID"] = 'Retail';
        $paramList["CHANNEL_ID"] = 'WEB';
        $paramList["TXN_AMOUNT"] = $amount;
        $paramList["WEBSITE"] = 'WEBSTAGING';
        $paramList["CALLBACK_URL"] = url('/paytm-callback');
        $paytm_merchant_key = 'r&8KavBD#%tAtiec';
        //Here checksum string will return by getChecksumFromArray() function.
        $checksum = getChecksumFromArray($paramList,$paytm_merchant_key);

        return array(
            'checksum' => $checksum,
            'paramList' => $paramList
        );
    }

    public function thanks()
    {
        $navbar = Navbar::all();
        $corder = Courseorder::all();
        $user_email=Auth::User()->email;
        $user_id=Auth::User()->id;
        DB::table('carts')->where('user_email',$user_email)->delete();
        if(Auth::check()){
            $user_email=Auth::User()->email;
            $cart= Cart::where('user_email',$user_email)->get();
        }
        else{
            $session_id = Session::getId();
            // print_r($session_id);
            // die;
            $cart= Cart::where('session_id',$session_id)->get();
        }
        return view('front.thanks',Compact('navbar','cart','corder','user_id'))->with('message','Course Purchased Successfully');
    }
    public function paymentsuccess()
    {
        return view('front.payment-success');
    }

    public function paymentfail()
    {
        return view('front.payment-fail');
    }
    public function orderemail()
    {
        $navbar = Navbar::all();
        $corder = Courseorder::all();
        $corderd = Course_order_product::all();
        $id=1;
        return view('front.order_email',compact('navbar','corder','corderd','id'));
    }
    //callback
       public function paytmCallback( Request $request ) {
        // return $request;
        $order_id = $request['ORDERID'];

        if ( 'TXN_SUCCESS' === $request['STATUS'] ) {
            $transaction_id = $request['TXNID'];
            $order = Courseorder::where( 'order_id', $order_id )->first();
            $order->order_status = 'Complete';
            $order->transaction_id = $transaction_id;
            $order->save();
            $user_email=Auth::User()->email;
            DB::table('carts')->where('user_email',$user_email)->delete();
            //order email
            $user = User::where('email',$user_email)->first(); 
            $to = $user_email;
            $navbar = Navbar::all();
            $corder = Courseorder::all();
            $corderd = Course_order_product::all();
            $id = $order->id;
            $subject = 'User Order Successful';
            $message = "Your Order Is Successful In PnInfosys Course Program \n\n";
            Mail::send('front.order_email', ['msg' => $message,'navbar' => $navbar,'corder' => $corder,'corderd' => $corderd,'id' => $id, 'user' => $user] , function($message) use ($to){ 
                $message->to($to, 'User')->subject('User Order');  
            }); 
            //end oreder email
            return view('front.payment-success');
            // echo$order;
           } 
           else if( 'TXN_FAILURE' === $request['STATUS'] ){
            return view( 'front.payment-fail' );
        }
    }

    public function getAllEncdecFunc(){
        function encrypt_e($input, $ky) {
    $key   = html_entity_decode($ky);
    $iv = "@@@@&&&&####$$$$";
    $data = openssl_encrypt ( $input , "AES-128-CBC" , $key, 0, $iv );
    return $data;
}

function decrypt_e($crypt, $ky) {
    $key   = html_entity_decode($ky);
    $iv = "@@@@&&&&####$$$$";
    $data = openssl_decrypt ( $crypt , "AES-128-CBC" , $key, 0, $iv );
    return $data;
}

function generateSalt_e($length) {
    $random = "";
    srand((double) microtime() * 1000000);

    $data = "AbcDE123IJKLMN67QRSTUVWXYZ";
    $data .= "aBCdefghijklmn123opq45rs67tuv89wxyz";
    $data .= "0FGH45OP89";

    for ($i = 0; $i < $length; $i++) {
        $random .= substr($data, (rand() % (strlen($data))), 1);
    }

    return $random;
}

function checkString_e($value) {
    if ($value == 'null')
        $value = '';
    return $value;
}

function getChecksumFromArray($arrayList, $key, $sort=1) {
    if ($sort != 0) {
        ksort($arrayList);
    }
    $str = getArray2Str($arrayList);
    $salt = generateSalt_e(4);
    $finalString = $str . "|" . $salt;
    $hash = hash("sha256", $finalString);
    $hashString = $hash . $salt;
    $checksum = encrypt_e($hashString, $key);
    return $checksum;
}
function getChecksumFromString($str, $key) {
    
    $salt = generateSalt_e(4);
    $finalString = $str . "|" . $salt;
    $hash = hash("sha256", $finalString);
    $hashString = $hash . $salt;
    $checksum = encrypt_e($hashString, $key);
    return $checksum;
}

function verifychecksum_e($arrayList, $key, $checksumvalue) {
    $arrayList = removeCheckSumParam($arrayList);
    ksort($arrayList);
    $str = getArray2StrForVerify($arrayList);
    $paytm_hash = decrypt_e($checksumvalue, $key);
    $salt = substr($paytm_hash, -4);

    $finalString = $str . "|" . $salt;

    $website_hash = hash("sha256", $finalString);
    $website_hash .= $salt;

    $validFlag = "FALSE";
    if ($website_hash == $paytm_hash) {
        $validFlag = "TRUE";
    } else {
        $validFlag = "FALSE";
    }
    return $validFlag;
}

function verifychecksum_eFromStr($str, $key, $checksumvalue) {
    $paytm_hash = decrypt_e($checksumvalue, $key);
    $salt = substr($paytm_hash, -4);

    $finalString = $str . "|" . $salt;

    $website_hash = hash("sha256", $finalString);
    $website_hash .= $salt;

    $validFlag = "FALSE";
    if ($website_hash == $paytm_hash) {
        $validFlag = "TRUE";
    } else {
        $validFlag = "FALSE";
    }
    return $validFlag;
}

function getArray2Str($arrayList) {
    $findme   = 'REFUND';
    $findmepipe = '|';
    $paramStr = "";
    $flag = 1;  
    foreach ($arrayList as $key => $value) {
        $pos = strpos($value, $findme);
        $pospipe = strpos($value, $findmepipe);
        if ($pos !== false || $pospipe !== false) 
        {
            continue;
        }
        
        if ($flag) {
            $paramStr .= checkString_e($value);
            $flag = 0;
        } else {
            $paramStr .= "|" . checkString_e($value);
        }
    }
    return $paramStr;
}

function getArray2StrForVerify($arrayList) {
    $paramStr = "";
    $flag = 1;
    foreach ($arrayList as $key => $value) {
        if ($flag) {
            $paramStr .= checkString_e($value);
            $flag = 0;
        } else {
            $paramStr .= "|" . checkString_e($value);
        }
    }
    return $paramStr;
}

function redirect2PG($paramList, $key) {
    $hashString = getchecksumFromArray($paramList);
    $checksum = encrypt_e($hashString, $key);
}

function removeCheckSumParam($arrayList) {
    if (isset($arrayList["CHECKSUMHASH"])) {
        unset($arrayList["CHECKSUMHASH"]);
    }
    return $arrayList;
}

function getTxnStatus($requestParamList) {
    return callAPI(PAYTM_STATUS_QUERY_URL, $requestParamList);
}

function getTxnStatusNew($requestParamList) {
    return callNewAPI(PAYTM_STATUS_QUERY_NEW_URL, $requestParamList);
}

function initiateTxnRefund($requestParamList) {
    $CHECKSUM = getRefundChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY,0);
    $requestParamList["CHECKSUM"] = $CHECKSUM;
    return callAPI(PAYTM_REFUND_URL, $requestParamList);
}

function callAPI($apiURL, $requestParamList) {
    $jsonResponse = "";
    $responseParamList = array();
    $JsonData =json_encode($requestParamList);
    $postData = 'JsonData='.urlencode($JsonData);
    $ch = curl_init($apiURL);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);                                                                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                         
    'Content-Type: application/json', 
    'Content-Length: ' . strlen($postData))                                                                       
    );  
    $jsonResponse = curl_exec($ch);   
    $responseParamList = json_decode($jsonResponse,true);
    return $responseParamList;
}

function callNewAPI($apiURL, $requestParamList) {
    $jsonResponse = "";
    $responseParamList = array();
    $JsonData =json_encode($requestParamList);
    $postData = 'JsonData='.urlencode($JsonData);
    $ch = curl_init($apiURL);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);                                                                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                         
    'Content-Type: application/json', 
    'Content-Length: ' . strlen($postData))                                                                       
    );  
    $jsonResponse = curl_exec($ch);   
    $responseParamList = json_decode($jsonResponse,true);
    return $responseParamList;
}
function getRefundChecksumFromArray($arrayList, $key, $sort=1) {
    if ($sort != 0) {
        ksort($arrayList);
    }
    $str = getRefundArray2Str($arrayList);
    $salt = generateSalt_e(4);
    $finalString = $str . "|" . $salt;
    $hash = hash("sha256", $finalString);
    $hashString = $hash . $salt;
    $checksum = encrypt_e($hashString, $key);
    return $checksum;
}
function getRefundArray2Str($arrayList) {   
    $findmepipe = '|';
    $paramStr = "";
    $flag = 1;  
    foreach ($arrayList as $key => $value) {        
        $pospipe = strpos($value, $findmepipe);
        if ($pospipe !== false) 
        {
            continue;
        }
        
        if ($flag) {
            $paramStr .= checkString_e($value);
            $flag = 0;
        } else {
            $paramStr .= "|" . checkString_e($value);
        }
    }
    return $paramStr;
}
function callRefundAPI($refundApiURL, $requestParamList) {
    $jsonResponse = "";
    $responseParamList = array();
    $JsonData =json_encode($requestParamList);
    $postData = 'JsonData='.urlencode($JsonData);
    $ch = curl_init($apiURL);   
    curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_URL, $refundApiURL);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    $headers = array();
    $headers[] = 'Content-Type: application/json';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);  
    $jsonResponse = curl_exec($ch);   
    $responseParamList = json_decode($jsonResponse,true);
    return $responseParamList;
}
    }

    //conf. file
    public function getConfigPaytmSettings(){
        define('PAYTM_ENVIRONMENT', 'TEST'); // PROD
define('PAYTM_MERCHANT_KEY', 'r&8KavBD#%tAtiec'); //Change this constant's value with Merchant key received from Paytm.
define('PAYTM_MERCHANT_MID', 'eVpbkQ44876418419806'); //Change this constant's value with MID (Merchant ID) received from Paytm.
define('PAYTM_MERCHANT_WEBSITE', 'WEBSTAGING'); //Change this constant's value with Website name received from Paytm.

$PAYTM_STATUS_QUERY_NEW_URL='https://securegw-stage.paytm.in/merchant-status/getTxnStatus';
$PAYTM_TXN_URL='https://securegw-stage.paytm.in/theia/processTransaction';
if (PAYTM_ENVIRONMENT == 'PROD') {
    $PAYTM_STATUS_QUERY_NEW_URL='https://securegw.paytm.in/merchant-status/getTxnStatus';
    $PAYTM_TXN_URL='https://securegw.paytm.in/theia/processTransaction';
}

define('PAYTM_REFUND_URL', '');
define('PAYTM_STATUS_QUERY_URL', $PAYTM_STATUS_QUERY_NEW_URL);
define('PAYTM_STATUS_QUERY_NEW_URL', $PAYTM_STATUS_QUERY_NEW_URL);
define('PAYTM_TXN_URL', $PAYTM_TXN_URL);
    }
}

