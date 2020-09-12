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
// Route::get('/', function () {
//     return view('modules.Admin.adminLogin');
// });

    
    Route::get('createsuccess','PageController@createsuccess')->name('createsuccess');
    

// Controller cua User
Route::namespace('User')->prefix('user')->name('user.')->group(function(){  
    Route::get('login','LoginController@showLogin')->name('login');
    Route::post('loginprogress','LoginController@loginprogress')->name('loginprogress');
    Route::get('logout','LoginController@logOut')->name('logout');

    Route::get('create','UserController@create')->name('create');
    Route::post('store','UserController@store')->name('store');

    Route::get('createinfo','UserInfoController@create')->name('createinfo');
    Route::post('storeinfo/{id}','UserInfoController@store')->name('storeinfo');
    
    //danh sach user 
    Route::get('userlist','UserController@userlist')->name('userlist');
    Route::get('delete/{id}','UserController@destroy')->name('delete');
    Route::get('edit/{id}','UserController@edit')->name('edit');
    Route::post('update/{id}','UserController@update')->name('update');

    //---------User Profile-----------
    Route::get('profile', 'ProfileController@profile')->name('profile');
    
    //---------Edit Profile-----------
    Route::get('editprofile', 'ProfileController@editprofile')->name('editprofile');
    Route::post('updateprofile/{id}', 'ProfileController@update')->name('updateprofile');
});

// Controller cua Admin
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){  
    Route::get('login','LoginController@showLogin')->name('login');
    Route::get('logout','LoginController@logOut')->name('logout');
    Route::post('loginprogress','LoginController@loginprogress')->name('loginprogress');

    Route::get('create','AdminController@create')->name('create');
    Route::post('store','AdminController@store')->name('store');

    Route::get('edit/{id}','AdminController@edit')->name('edit');
    Route::get('delete/{id}','AdminController@destroy')->name('delete');
    Route::post('update/{id}','AdminController@update')->name('update');

    Route::get('adminlist','AdminController@adminlist')->name('adminlist');
   
});


//Middleware admin login
Route::middleware('checkadminlogin')->group(function (){
    Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
        Route::get('index','AdminController@index')->name('index');
    });
});

// user home page
  
    Route::get('home','PageController@home')->name('home');

// Controller cua Game
Route::namespace('Game')->prefix('game')->name('game.')->group(function(){  
    Route::get('create','GameController@create')->name('create');
    Route::post('store','GameController@store')->name('store');

    Route::get('index','GameController@index')->name('index');
    Route::get('home/{id}','GameController@home')->name('home');
    Route::get('gamebycategory/{id}','GameController@gamebycategory')->name('gamebycategory');
    // Route::post('gamebycategory/{id}','GameController@gamebycategory')->name('gamebycategory');

    Route::post('search','GameController@search')->name('search');
    Route::get('searchresult','GameController@searchResult')->name('searchresult');

    Route::get('delete/{id}','GameController@destroy')->name('delete');
    Route::get('edit/{id}','GameController@edit')->name('edit');
    Route::post('update/{id}','GameController@update')->name('update');

    Route::get('createcategory','GameController@category')->name('createcategory');
    Route::post('storecategory','GameController@categorystore')->name('storecategory');
});
