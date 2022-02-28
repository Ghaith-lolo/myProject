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

Route::group(['prefix' => 'offers'], function () {

    Route::get('create', 'OfferController@setCreate')->middleware('auth')->name('create');
    Route::post('store', 'OfferController@store')->name('offers.store');


    Route::get('edit/{offer_id}', 'OfferController@editOffer')->name('edit')->middleware('auth');
    Route::post('update{offer_id}', 'OfferController@updateOffer')->name('offers.update');
    Route::get('delete{offer_id}', 'OfferController@deleteOffer')->name('offers.delete');


    Route::get('offer_all' , 'OfferController@getAllOffers')->name('all');
});
 Route::get('youtupe' ,'YoutupeController@getVideo');





Route::get('has-one' , 'relationController@hasOneRelation');
Route::get('has-one-rev' , 'relationController@hasOneRelationRevers');

Route::get('has-one-has-phone' , 'relationController@hasOneRelationHasPhone');
Route::get('has-one-not-has-phone' , 'relationController@hasOneRelationNotHasPhone');



