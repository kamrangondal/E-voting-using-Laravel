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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/vadmin', [App\Http\Controllers\VadminController::class, 'index'])->name('/vadmin');

Route::get('election/election','App\Http\Controllers\ElectionController@index');
Route::post('election/store','App\Http\Controllers\ElectionController@store')->name('election.store');
Route::get('election/read-election','App\Http\Controllers\ElectionController@read')->name('election.read');
Route::get('election/update-election/{id}', 'App\Http\Controllers\ElectionController@update');
Route::post('election/saveUpdatedData/{id}', 'App\Http\Controllers\ElectionController@saveUpdatedData')->name('saveUpdatedData.election');
Route::get('election/delete-election/{id}','App\Http\Controllers\ElectionController@delete');

Route::get('position/position','App\Http\Controllers\PositionController@index');
Route::post('position/store','App\Http\Controllers\PositionController@store')->name('position.store');
Route::get('position/read-position','App\Http\Controllers\PositionController@read')->name('position.read');
Route::get('position/update-position/{id}', 'App\Http\Controllers\PositionController@update');
Route::post('position/saveUpdatedData/{id}', 'App\Http\Controllers\PositionController@saveUpdatedData')->name('saveUpdatedData.position');
Route::get('position/delete-position/{id}','App\Http\Controllers\PositionController@delete');

Route::get('nominee/nominee','App\Http\Controllers\NomineeController@index');
Route::post('nominee/store','App\Http\Controllers\NomineeController@store')->name('nominee.store');
Route::get('nominee/read-nominee','App\Http\Controllers\NomineeController@read')->name('nominee.read');
Route::get('nominee/update-nominee/{id}', 'App\Http\Controllers\NomineeController@update');
Route::post('nominee/saveUpdatedData/{id}', 'App\Http\Controllers\NomineeController@saveUpdatedData')->name('saveUpdatedData.nominee');
Route::get('nominee/delete-nominee/{id}','App\Http\Controllers\NomineeController@delete');

Route::get('voter/voter','App\Http\Controllers\VoterController@index');
Route::post('voter/store','App\Http\Controllers\VoterController@store')->name('voter.store');


Route::get('result1', [App\Http\Controllers\Result1Controller::class, 'index'])->name('result1');
Route::post('result1/search',[App\Http\Controllers\Result1Controller::class, 'search'])->name('result1.search');


Route::post('mailer','App\Http\Controllers\MailController@sendMail')->name('send.email');
Route::get('mailer','App\Http\Controllers\MailController@index');


// Route::group([ 'middleware' => ['auth', 'role:admin']], function () {
//     Route::get('/vadmin', 'App\Http\Controllers\VadminController@index ') 
//     ->name('vadmin');
// });