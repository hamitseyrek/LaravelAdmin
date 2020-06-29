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

Route::get('/home', 'HomeController@index')->name('home');


//admin paneli yönlendirmelerini bir gurup haline getirdik. sistem otomatik "yonetim öneki ekleyecek
Route::group(['prefix'=>"yonetim"], function(){
    Route::get("/","YonetimController@index")->name("yonetim.index");
    Route::resource("settings", "SettingController");
    Route::resource("kategoriler", "KategoriController");

    Route::resource("yazilar", "YaziController");



});
