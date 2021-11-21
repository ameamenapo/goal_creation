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

Route::get('/', function () {
    return view('welcome');
});


Route::get('goal', 'GoalController@index');
Route::get('goal/add', 'GoalController@add');
Route::post('goal/add', 'GoalController@create');
Route::get('goal/edit', 'GoalController@edit');
Route::post('goal/edit', 'GoalController@update');
Route::get('goal/list', 'GoalController@choose');
Route::get('goal/list1', 'GoalController@choose1');
Route::get('goal/list2', 'GoalController@choose2');
Route::get('goal/list3', 'GoalController@choose3');
Route::post('goal', 'GoalController@register');
Route::get('goal/del_list', 'GoalController@delete');
Route::post('goal/del_list', 'GoalController@remove');

Route::get('goal/today_goal', 'GoalController@today_goal')->name('goal.today_goal');
Route::get('goal/first_day', 'GoalController@first_day')->name('goal.first_day');
Route::post('goal/first_day', 'AchievementController@first_post');
Route::get('goal/second_day', 'GoalController@second_day')->name('goal.second_day');
Route::post('goal/second_day', 'AchievementController@second_post');

//Route::get('goal/achievement', 'AchievementController@index');
//Route::post('goal/today_goal', 'AchievementController@post');//１日目のやることが表示される。
//Route::post('goal/second_day', 'AchievementController@second_post');//２日目のやることが表示される。

//Route::get('person', 'PersonController@index');
//Route::get('person/signup', 'PersonController@getSignup');
//Route::post('person/signup', 'PersonController@postSignup');
//Route::get('person/login', 'PersonController@getLogin');
//Route::post('person/index', 'PersonController@postLogin');

Auth::routes();
Route::get('user', 'UserController@index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
