<?php

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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/home', 'HomeController@index')->name('home');
Route::post('/registeruser', 'ApplicationController@userregister');
Route::post('/loginuser', 'ApplicationController@mLogin');
Route::get('getprovince', 'ApplicationController@getProvinces');
Route::post('PhoneExist', 'ApplicationController@isEmailorPhoneExist');
Route::post('post', 'ApplicationController@PostSomething');
Route::get('getPosts', 'ApplicationController@getPosts');
Route::get('count_posts/{id}','ApplicationController@count_post');
Route::get('getSinglePost/{id}','ApplicationController@getSinglePosts' );
Route::get('getprovince', 'ApplicationController@getProvince');
Route::get('Searchbyprovinces/{id}','ApplicationController@SearchByProvince');
Route::get('getcategory', 'ApplicationController@getCategory');
Route::get('SearchByCategory/{id}','ApplicationController@SearchByCategories');

Route::get('top_users/{id}','ApplicationController@TopUsers');

Route::get('getEditPost/{id}','ApplicationController@getPostsToEdit' );
Route::post('EditPost', 'ApplicationController@EditPosts');
Route::get('delete_post/{id}','ApplicationController@delete_posts' );

Route::post('SearchByCP','ApplicationController@SearchByCPs');
//user profile routes
Route::get('getUserInfo/{id}', 'ApplicationController@getUserInfo');
Route::get('get_user_posts/{id}', 'ApplicationController@getUserPosts');
Route::get('get_user_experience/{id}', 'ApplicationController@getExpereinces');
Route::post('addexperiences','ApplicationController@addExperiences');

Route::get('delete_user_experience/{id}', 'ApplicationController@deletexperiences');
Route::post('update_user_experience', 'ApplicationController@updateexperiences');

Route::post('addSkill','ApplicationController@addSkills');
Route::get('get_user_skill/{id}', 'ApplicationController@getkills');
Route::get('delete_user_skill/{id}', 'ApplicationController@deletekills');
Route::post('update_user_skill', 'ApplicationController@updatekills');
//user
Route::post('update_user_data','ApplicationController@update_users_data');
//rating
Route::post('save_user_rate','ApplicationController@save_rate');
Route::post('update_user_rate','ApplicationController@update_rate');
Route::get('get_user_rate/{id}', 'ApplicationController@get_rate');
//check if the login user rated other users
Route::post('check_ratting', 'ApplicationController@get_rated_user');
Route::post('count_ratting', 'ApplicationController@count_rate');
//favorite
Route::post('favoriteSave', 'ApplicationController@favoriteInsert');
Route::get('favoriteDeletes/{id}', 'ApplicationController@favoriteDelete');
Route::get('getFavoritedPost/{id}', 'ApplicationController@getFavoritedPosts');
//report
Route::post('reportUser', 'ApplicationController@reportUsers');
Route::post('reportPost', 'ApplicationController@reportPosts');
Route::get('report_delete/{id}', 'HomeController@deleteReports');

Route::get('deleteAccount/{id}', 'ApplicationController@deleteUserAccount');
Route::post('getPassword', 'ApplicationController@getPasswords');
Route::post('changePassword', 'ApplicationController@changePasswords');
/////////////////////////ADMIN PANEL /////////////////////////////////////
Route::get('mainpage', 'HomeController@mainPage');
//user
Route::get('usersdata', 'HomeController@userdata'); 
Route::get('user_delete/{id}', 'HomeController@deleteUser');

Route::get('postdata', 'HomeController@Postsdata'); 
Route::get('post_delete/{id}', 'HomeController@deletePosts');

Route::get('userReport', 'HomeController@user_report');
Route::get('postReport', 'HomeController@post_report');
Route::get('user_posts/{id}', 'HomeController@UserPosts');

Route::get('userregister', function(){
	return view('Karapp.registeruser');
});
Route::post('registeruser', 'HomeController@userregister');
Route::get('edituserprofile', 'HomeController@editUserProfiles');
Route::post('updateprofile', 'HomeController@updateProfile');

//header information
view()->composer(['*'], function($view){
    

    $userss = DB::table('users')->count();
    $posts = DB::table('post')->count();
    $reportsu = DB::table('report')->where('type', '=', 'u')->count();
    $reportsp = DB::table('report')->where('type', '=', 'p')->count();

    $view->with('userss', $userss);
    $view->with('posts', $posts);
    $view->with('reportsu', $reportsu);
    $view->with('reportsp', $reportsp);

});

Auth::routes();

