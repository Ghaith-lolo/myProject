<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
//     $data = [];
//     $data['id'] = 1;
//     $data['name'] = 'Ghaith';
//     $data['num'] = 2 ;

//     return view('welcome' , $data);
// });

Route::get('/', 'HomeController@index');

Route::get('/test/{id}', function ($id) {
    return "welcome $id";
})->middleware('auth');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

// Route::namespace('Front')->group( function () {
//     Route::get('/first',  'UserController@userShow');
// });

Route::resource('news', 'AddController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/offer', 'OfferController@getOffers');
Route::group(['perfix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function() {

    Route::group(['prefix' => 'offers'], function () {

        Route::get('create', 'OfferController@setCreate')->middleware('auth');
        Route::post('store', 'OfferController@store')->name('offers.store');
    });
});
