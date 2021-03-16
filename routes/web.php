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
Route::post('contact_submit','FrontendController@contactsubmit');

//addtocart
Route::get('addtocart','CartController@cart');
Route::post('cartsubmit','CartController@cartsubmit');

//Signup Controller
Route::get('signup','SignupController@signup');
Route::post('submit','SignupController@submit');
Route::get('user_login','SignupController@user_login');
Route::post('login_submit','SignupController@login_submit');

Auth::routes();

//Admin controller
Route::get('admin','AdminController@index');
Route::get('admin/contact','AdminController@contact');
Route::get('admin/contact_delete/{id}','AdminController@delete');

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

