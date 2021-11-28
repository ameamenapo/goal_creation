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

//以下は目標一覧や目標作成などに関するルーティング
Route::get('goal', 'GoalController@index');
Route::get('goal/add', 'GoalController@add');
Route::post('goal/add', 'GoalController@create');
Route::get('goal/edit', 'GoalController@edit')->name('goal.edit');
Route::post('goal/edit', 'GoalController@update');
Route::get('goal/list', 'GoalController@choose');
Route::get('goal/list1', 'GoalController@choose1');
Route::get('goal/list2', 'GoalController@choose2');
Route::get('goal/list3', 'GoalController@choose3');
Route::post('goal', 'GoalController@register');
Route::get('goal/del_list', 'GoalController@delete');
Route::post('goal/del_list', 'GoalController@remove');

//以下は目標達成に関するルーティング
Route::get('goal/today_goal', 'GoalController@today_goal')->name('goal.today_goal');
Route::get('goal/first_day', 'GoalController@first_day')->name('goal.first_day');//URLに直接first_day入れてgetアクセスするとテーマとか何も入ってない画面表示になる。どうしたものか。
Route::post('goal/first_day', 'AchievementController@first_post');
Route::get('goal/second_day', 'GoalController@second_day')->name('goal.second_day');
Route::post('goal/second_day', 'AchievementController@second_post');
Route::get('goal/third_day', 'GoalController@third_day')->name('goal.third_day');
Route::post('goal/third_day', 'AchievementController@third_post');
Route::get('goal/fourth_day', 'GoalController@fourth_day')->name('goal.fourth_day');
Route::post('goal/fourth_day', 'AchievementController@fourth_post');
Route::get('goal/fifth_day', 'GoalController@fifth_day')->name('goal.fifth_day');
Route::post('goal/fifth_day', 'AchievementController@fifth_post');
Route::get('goal/sixth_day', 'GoalController@sixth_day')->name('goal.sixth_day');
Route::post('goal/sixth_day', 'AchievementController@sixth_post');
Route::get('goal/seventh_day', 'GoalController@seventh_day')->name('goal.seventh_day');
Route::post('goal/seventh_day', 'AchievementController@seventh_post');
Route::get('goal/achievement', 'AchievementController@index');

//Route::get('person', 'PersonController@index');
//Route::get('person/signup', 'PersonController@getSignup');
//Route::post('person/signup', 'PersonController@postSignup');
//Route::get('person/login', 'PersonController@getLogin');
//Route::post('person/index', 'PersonController@postLogin');

Route::get('user', 'UserController@index');
Route::get('user/edit', 'UserController@edit')->name('user.edit');
Route::post('user/edit', 'UserController@update');


//以下の二行はphp artisan make:authしてauth機能を追加したら自動的に追加されたもの。
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
