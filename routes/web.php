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
Route::group(['prefix'=>"yonetim","middleware"=>"admin"], function(){
    Route::get("/","YonetimController@index")->name("yonetim.index");
    Route::resource("settings", "SettingController");
    Route::resource("kategoriler", "KategoriController");

    Route::resource("yazilar", "YaziController");
    Route::resource("sayfalar", "SayfaController");
    Route::get("cikis","YonetimController@cikis")->name("yonetim.cikis");


    Route::get("kullanicilar", "YonetimController@kullanicilar")->name("kullanici.index");
    Route::get("kullaniciekle", "YonetimController@kullaniciekle")->name("kullanici.ekle");
    Route::post("kullanicikayit", "YonetimController@kullanicikayit")->name("kullanici.kayit");
    Route::get("kullaniciduzenle/{id}", "YonetimController@kullaniciduzenle")->name("kullanici.duzenle");
    Route::post("kullaniciguncelle/{id}", "YonetimController@kullaniciguncelle")->name("kullanici.guncelle");
    Route::delete("kullanicisil/{id}", "YonetimController@kullanicisil")->name("kullanici.sil");



});
