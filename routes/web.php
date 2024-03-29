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

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Backend\BackendRequestHandler;
use App\Http\Controllers\User\UserSecretController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/panel.php', function () {
    return view('layouts/panel', ['username'=>Auth::user()['user'], 'firstname'=>Auth::user()['firstname'], 'lastname'=>Auth::user()['lastname'], 'email'=>Auth::user()['email'], 'permissionlevel'=>Auth::user()['permissionlevel'], 'userid'=>Auth::id(), 'pendingappeals'=>0, 'runningservers'=>1, 'last24errors'=>0, 'supportrequests'=>0, 'dtdev'=>"2.3 Developer"]);
})->middleware('auth:dtadmin');

Route::get('/settings.php', function () {
    return view('layouts/settings', ['username'=>Auth::user()['user'], 'firstname'=>Auth::user()['firstname'], 'lastname'=>Auth::user()['lastname'], 'email'=>Auth::user()['email'], 'permissionlevel'=>Auth::user()['permissionlevel'], 'userid'=>Auth::id(), 'pendingappeals'=>0, 'runningservers'=>1, 'last24errors'=>0, 'supportrequests'=>0, 'dtdev'=>"2.3 Developer", 'secretkeys'=>UserSecretController::getUserSecretTable(Auth::id())]);
})->middleware('auth:dtadmin');

Route::get('/server/backend.php', function (Request $request) {
  BackendRequestHandler::HandleRequest($request);
});

Route::post('/server/backend.php', function (Request $request) {
  BackendRequestHandler::HandleRequest($request);
});

Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::get('/login.php', 'Auth\LoginController@showLoginForm');
Route::get('/signout.php', 'Auth\LoginController@logout');

Route::get('/signup.php', 'Auth\RegisterController@showRegistrationForm');
Route::post('/signup.php', 'Auth\RegisterController@register');

Route::get('reset.php/token{token?}', 'Auth\PasswordController@showResetForm');
Route::post('reset.php/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('reset.php/reset', 'Auth\PasswordController@reset');
