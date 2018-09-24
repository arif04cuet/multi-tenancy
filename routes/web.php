<?php

use App\User;
use Hyn\Tenancy\Models\Customer;
use Illuminate\Support\Facades\Config;

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

Route::get('hostname', function () {
    return config('app.url');
});
Route::get('customers', function () {
    return Customer::all();
});

Route::group(['middleware' => 'tenancy.enforce'], function () {
    Auth::routes();
    Route::get('users', function () {
        return User::all();
    });
});

Route::get('/home', 'HomeController@index')->name('home');
