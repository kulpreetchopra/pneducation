<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Frontend Controller
Route::get('/','FrontendController@index');
Route::get('courses/{id}','FrontendController@courses');
Route::get('allcourses','FrontendController@allcourses');
Route::get('courseslist','FrontendController@courseslist');
Route::get('allcategory/{id}','FrontendController@allcategory');
Route::get('categorylist/{id}','FrontendController@categorylist');
Route::get('ourteam','FrontendController@ourteam');
Route::get('interns','FrontendController@interns');
Route::get('placements','FrontendController@placements');
Route::get('contact','FrontendController@contact');
Route::get('about','FrontendController@about');
Route::get('workshop','FrontendController@workshop');
Route::post('contact_submit','FrontendController@contactsubmit');
Route::post('subscribers_submit','FrontendController@subscribersubmit');
Route::post('rating_submit','FrontendController@ratingsubmit');

//search
Route::post('search','FrontendController@search');

//Account user
Route::get('account','FrontendController@account');
Route::get('account/cart','FrontendController@account_cart');
Route::get('account/bill','FrontendController@account_bill');
Route::get('account/order','FrontendController@account_order');
Route::get('account/contact','FrontendController@account_contact');

//addtocart [Cart Controller]
Route::get('addtocart','CartController@cart');
Route::post('cartsubmit','CartController@cartsubmit');
Route::get('coursequantity_update/{id}/{course_quantity}','CartController@coursequantity_update');
Route::get('cart_delete/{id}','CartController@delete');
Route::get('thanks','CartController@thanks');

//checkout [Cart Controller]
Route::get('checkout','CartController@checkout');
Route::post('checkout_submit','CartController@checkoutsubmit');

//Signup Controller
Route::get('signup','SignupController@signup');
Route::post('submit','SignupController@submit');
Route::post('update_password','SignupController@update_password');
Route::post('update_phone','SignupController@update_phone');
Route::get('user_login','SignupController@user_login');
Route::post('login_submit','SignupController@login_submit');
Route::get('user_logout','SignupController@user_logout');

Auth::routes();
//google login
Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');

//facebook login
Route::get('auth/facebook', 'Auth\FacebookController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\FacebookController@handleFacebookCallback');

//linkedin login
Route::get('auth/linkedin', 'Auth\LinkedinController@redirectToLinkedin');
Route::get('auth/linkedin/callback', 'Auth\LinkedinController@handleLinkedinCallback');

//Admin controller
Route::get('admin','AdminController@index');
Route::get('admin/contact','AdminController@contact');
Route::get('admin/contact_reply/{id}','AdminController@reply');
Route::post('admin/contact_update','AdminController@update');
Route::get('admin/contact_delete/{id}','AdminController@delete');
Route::get('admin/subscribers','AdminController@subscribers');
Route::get('admin/subscribers_delete/{id}','AdminController@subscriberdelete');
Route::get('admin/orders','AdminController@orders');
Route::get('admin/users','AdminController@users');

//Category controller
Route::get('admin/category','CategoryController@display');
Route::post('admin/submit','CategoryController@submit');
Route::get('admin/category_edit/{id}','CategoryController@edit');
Route::post('admin/category_update','CategoryController@update');
Route::get('admin/category_delete/{id}','CategoryController@delete');

//courses controller
Route::get('admin/course','CourseController@display');
Route::post('admin/course_submit','CourseController@submit');
Route::get('admin/course_edit/{id}','CourseController@edit');
Route::post('admin/course_update','CourseController@update');
Route::get('admin/course_delete/{id}','CourseController@delete');

//banner controller
Route::get('admin/banner','BannerController@display');
Route::post('admin/banner_submit','BannerController@submit');
Route::get('admin/banner_edit/{id}','BannerController@edit');
Route::post('admin/banner_update','BannerController@update');
Route::get('admin/banner_delete/{id}','BannerController@delete');

//Alert controller
Route::get('admin/alert','AlertController@display');
Route::post('admin/alert_submit','AlertController@submit');
Route::get('admin/alert_edit/{id}','AlertController@edit');
Route::post('admin/alert_update','AlertController@update');
Route::get('admin/alert_delete/{id}','AlertController@delete');

//Special controller
Route::get('admin/special','SpecialController@display');
Route::post('admin/special_submit','SpecialController@submit');
Route::get('admin/special_edit/{id}','SpecialController@edit');
Route::post('admin/special_update','SpecialController@update');
Route::get('admin/special_delete/{id}','SpecialController@delete');

//Navbar controller
Route::get('admin/navbar','NavbarController@display');
Route::post('admin/navbar_submit','NavbarController@submit');
Route::get('admin/navbar_edit/{id}','NavbarController@edit');
Route::post('admin/navbar_update','NavbarController@update');
Route::get('admin/navbar_delete/{id}','NavbarController@delete');

//OurTeam controller
Route::get('admin/ourteam','TeamController@display');
Route::post('admin/ourteam_submit','TeamController@submit');
Route::get('admin/ourteam_edit/{id}','TeamController@edit');
Route::post('admin/ourteam_update','TeamController@update');
Route::get('admin/ourteam_delete/{id}','TeamController@delete');

//Interns controller
Route::get('admin/interns','InternController@display');
Route::post('admin/interns_submit','InternController@submit');
Route::get('admin/interns_edit/{id}','InternController@edit');
Route::post('admin/interns_update','InternController@update');
Route::get('admin/interns_delete/{id}','InternController@delete');

//Placements controller
Route::get('admin/placements','PlacementController@display');
Route::post('admin/placements_submit','PlacementController@submit');
Route::get('admin/placements_edit/{id}','PlacementController@edit');
Route::post('admin/placements_update','PlacementController@update');
Route::get('admin/placements_delete/{id}','PlacementController@delete');

//Workshop controller
Route::get('admin/workshop','WorkshopController@display');
Route::post('admin/workshop_submit','WorkshopController@submit');
Route::get('admin/workshop_edit/{id}','WorkshopController@edit');
Route::post('admin/workshop_update','WorkshopController@update');
Route::get('admin/workshop_delete/{id}','WorkshopController@delete');

//Coupan controller
Route::get('admin/coupan','CoupanController@display');
Route::post('admin/coupan_submit','CoupanController@submit');
Route::get('admin/coupan_edit/{id}','CoupanController@edit');
Route::post('admin/coupan_update','CoupanController@update');
Route::get('admin/coupan_delete/{id}','CoupanController@delete');

//About controller -About
Route::get('admin/about','AboutController@display');
Route::post('admin/about_submit','AboutController@submit');
Route::get('admin/about_edit/{id}','AboutController@edit');
Route::post('admin/about_update','AboutController@update');
Route::get('admin/about_delete/{id}','AboutController@delete');

//Portfolio controller -About
Route::get('admin/portfolio','AboutController@display1');
Route::post('admin/portfolio_submit','AboutController@submit1');
Route::get('admin/portfolio_edit/{id}','AboutController@edit1');
Route::post('admin/portfolio_update','AboutController@update1');
Route::get('admin/portfolio_delete/{id}','AboutController@delete1');

//Bill
Route::get('admin/bill/{id}','AdminController@bill');
Route::get('admin/billprint/{id}','AdminController@billprint');

//Home Controller -Admin
Route::get('home','AdminController@index');