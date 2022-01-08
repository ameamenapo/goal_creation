<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;//パスワードリセット
use Illuminate\Support\Facades\Password;//パスワードリセット
use Illuminate\Auth\Events\PasswordReset;//パスワードリセット
use Illuminate\Support\Facades\Hash;//パスワードリセット
use Illuminate\Support\Str;//パスワードリセット

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

//以下はログアウトに関するルーティング
Route::get('user/logout', 'UserController@getLogout')->name('user.logout');
Route::post('user/logout', 'UserController@getLogout');
//Route::get('user/logout',[
//'uses' => 'UserController@getLogout',
//'as' => 'user.logout'
//]);



//以下は目標一覧や目標作成などに関するルーティング
Route::get('goal', 'GoalController@index');
Route::get('goal/add', 'GoalController@add')->name('goal.add');
Route::post('goal/add', 'GoalController@create');
Route::get('goal/edit', 'GoalController@edit')->name('goal.edit');
Route::post('goal/edit', 'GoalController@update');
Route::get('goal/list', 'GoalController@choose');
Route::get('goal/list1', 'GoalController@choose1')->name('goal.list1');
Route::get('goal/list2', 'GoalController@choose2')->name('goal.list2');
Route::get('goal/list3', 'GoalController@choose3')->name('goal.list3');
Route::post('goal/list1', 'GoalController@register1');
Route::post('goal/list2', 'GoalController@register2');
Route::post('goal/list3', 'GoalController@register3');
Route::get('goal/del_list', 'GoalController@delete')->name('goal.del_list');//目標一覧から目標を削除する
Route::post('goal/del_list', 'GoalController@remove');//目標一覧から目標を削除する
Route::get('goal_list/delete', 'Goal_listController@delete')->name('goal_list.delete');//自分の作った目標を削除する。完全にその目標が消えるということ。
Route::post('goal_list/delete', 'Goal_listController@remove');//自分の作った目標を削除する。完全にその目標が消えるということ。

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
//以下はユーザー情報に関するもの
Route::get('user', 'UserController@index');
Route::get('user/edit', 'UserController@edit')->name('user.edit');//ユーザー情報の編集
Route::post('user/edit', 'UserController@update');//ユーザー情報の編集
Route::get('user/destroy', 'UserController@withdrawal');//退会する
Route::post('user/destroy', 'UserController@destroy');//退会する
//以下はプロフィール編集に関するもの
Route::get('/profile', 'ProfileController@index');
Route::post('/profile', 'ProfileController@store');
Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');
Route::post('/profile/edit', 'ProfileController@update');

//以下は問い合わせに関するルーティング
Route::get('inquiry', 'InquiryController@form')->name('inquiry.form');
Route::post('inquiry', 'InquiryController@store');

Route::get('user/term', 'UserController@term');
Route::get('user/question', 'UserController@question');
Route::get('user/policy', 'UserController@policy');


//以下の二行はphp artisan make:authしてauth機能を追加したら自動的に追加されたもの。
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
