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


Route::get('lang/home','App\Http\Controllers\LangController@index');
Route::get('lang/change','App\Http\Controllers\LangController@change')->name('changeLang');


Route::group(['middleware'=>'notlogin'],function(){


    Route::get('/', function () {
        return view('brands');
    })-> name('start');



    
    Route::get('/clients', function () {
        return view('clients');
    })-> name('clients');
    
    Route::get('/products', function () {
        return view('products');
    })-> name('products');
    
    Route::get('/orders', function () {
        return view('orders');
    })-> name('orders');
    
    Route::get('/xerc', function () {
        return view('xerc');
    })-> name('xerc');
    
    Route::get('/orders', function () {
        return view('orders');
    })-> name('orders');
    

    Route::get('/logout','App\Http\Controllers\anbarController@logout')->name('logout');
    
    
    
    Route::post('/brands','App\Http\Controllers\anbarController@ok')->name('bgonder');
    Route::post('/clients','App\Http\Controllers\anbarController@ok1')->name('cgonder');
    Route::post('/xerc','App\Http\Controllers\anbarController@ok2')->name('xgonder');
    Route::post('/products','App\Http\Controllers\anbarController@ok3')->name('pgonder');
    Route::post('/orders','App\Http\Controllers\anbarController@ok4')->name('ogonder');
    
    Route::get('/','App\Http\Controllers\anbarController@index')->name('brands');
    Route::get('/clients','App\Http\Controllers\anbarController@index1')->name('clients');
    Route::get('/xerc','App\Http\Controllers\anbarController@index2')->name('xerc');
    Route::get('/products','App\Http\Controllers\anbarController@index3')->name('products');
    Route::get('/orders','App\Http\Controllers\anbarController@index4')->name('orders');
    
    
    Route::get('/Bsil/{id}','App\Http\Controllers\anbarController@Bsil')->name('Bsil');
    Route::get('/Byes/{id}','App\Http\Controllers\anbarController@Byes')->name('Byes');
    Route::get('/Bno/{ad}','App\Http\Controllers\anbarController@Bno')->name('Bno');
    Route::get('/Bedit/{id}','App\Http\Controllers\anbarController@Bedit')->name('Bedit');
    Route::post('/bupdate/{id}','App\Http\Controllers\anbarController@bupdate')->name('bupdate');
    
    
    Route::post('/cupdate/{id}','App\Http\Controllers\anbarController@cupdate')->name('cupdate');
    Route::get('/cedit/{id}','App\Http\Controllers\anbarController@cedit')->name('cedit');
    Route::get('/csil/{id}','App\Http\Controllers\anbarController@csil')->name('csil');
    Route::get('/cyes/{id}','App\Http\Controllers\anbarController@cyes')->name('cyes');
    Route::get('/cno/{ad}','App\Http\Controllers\anbarController@cno')->name('cno');
    
    Route::post('/xupdate/{id}','App\Http\Controllers\anbarController@xupdate')->name('xupdate');
    Route::get('/xedit/{id}','App\Http\Controllers\anbarController@xedit')->name('xedit');
    Route::get('/xsil/{id}','App\Http\Controllers\anbarController@xsil')->name('xsil');
    Route::get('/xyes/{id}','App\Http\Controllers\anbarController@xyes')->name('xyes');
    Route::get('/xno/{ad}','App\Http\Controllers\anbarController@xno')->name('xno');
    
    
    
    Route::post('/pupdate/{id}','App\Http\Controllers\anbarController@pupdate')->name('pupdate');
    Route::post('/Parolupdate','App\Http\Controllers\anbarController@Parolupdate')->name('Parolupdate');
    Route::get('/pedit/{pid}','App\Http\Controllers\anbarController@pedit')->name('pedit');
    Route::get('/psil/{pid}','App\Http\Controllers\anbarController@psil')->name('psil');
    Route::get('/pyes/{id}','App\Http\Controllers\anbarController@pyes')->name('pyes');
    Route::get('/pno/{ad}','App\Http\Controllers\anbarController@pno')->name('pno');
    
    
    Route::get('orders','App\Http\Controllers\anbarController@orders')->name('orders');
    Route::post('orders_insert','App\Http\Controllers\anbarController@orders_insert')->name('orders_insert');
    Route::get('orders_sil/{id}','App\Http\Controllers\anbarController@orders_sil')->name('orders_sil');
    Route::get('orders_delete/{id}','App\Http\Controllers\anbarController@orders_delete')->name('orders_delete');
    Route::get('orders_edit/{id}','App\Http\Controllers\anbarController@orders_edit')->name('orders_edit');
    Route::post('orders_update/{id}','App\Http\Controllers\anbarController@orders_update')->name('orders_update');
    Route::get('Otesdiq/{id}','App\Http\Controllers\anbarController@Otesdiq')->name('Otesdiq');
    Route::get('Oimtina/{id}','App\Http\Controllers\anbarController@Oimtina')->name('Oimtina');
    
    
    
    
    
    
    Route::get('/staff','App\Http\Controllers\anbarController@index6')->name('staff');
    Route::post('/staff','App\Http\Controllers\anbarController@ok6')->name('Sgonder');
    Route::get('/Ssil/{id}', 'App\Http\Controllers\anbarController@Ssil')->name('Ssil');
    Route::get('/Syes/{id}', 'App\Http\Controllers\anbarController@Syes')->name('Syes');
    Route::get('/Sno/{ad}', 'App\Http\Controllers\anbarController@Sno')->name('Sno');
    Route::get('/Sedit/{id}', 'App\Http\Controllers\anbarController@Sedit')->name('Sedit');
    Route::post('/Supdate/{id}', 'App\Http\Controllers\anbarController@Supdate')->name('Supdate');
    
    
    
    Route::get('/staff','App\Http\Controllers\anbarController@index6')->name('staff');
    Route::post('/staff','App\Http\Controllers\anbarController@ok6')->name('Sgonder');
    Route::get('/Ssil/{id}', 'App\Http\Controllers\anbarController@Ssil')->name('Ssil');
    Route::get('/Syes/{id}', 'App\Http\Controllers\anbarController@Syes')->name('Syes');
    Route::get('/Sno/{ad}', 'App\Http\Controllers\anbarController@Sno')->name('Sno');
    Route::get('/Sedit/{id}', 'App\Http\Controllers\anbarController@Sedit')->name('Sedit');
    Route::post('/Supdate/{id}', 'App\Http\Controllers\anbarController@Supdate')->name('Supdate');


    Route::get('/sobe','App\Http\Controllers\anbarController@index8')->name('sobe');
    Route::post('/sobe','App\Http\Controllers\anbarController@ok8')->name('Shgonder');
    Route::post('/Shupdate/{id}', 'App\Http\Controllers\anbarController@Shupdate')->name('Shupdate');
    Route::get('/Shedit/{id}','App\Http\Controllers\anbarController@Shedit')->name('Shedit');
    Route::get('/Shsil/{id}','App\Http\Controllers\anbarController@Shsil')->name('Shsil');
    Route::get('/Shyes/{id}','App\Http\Controllers\anbarController@Shyes')->name('Shyes');
    Route::get('/Shno/{ad}','App\Http\Controllers\anbarController@Shno')->name('Shno');
    
    Route::get('/profil','App\Http\Controllers\anbarController@Proindex')->name('profil');
    Route::post('/Prupdate', 'App\Http\Controllers\anbarController@Prupdate')->name('Prupdate');
    
    
    Route::get('/test','App\Http\Controllers\anbarController@test')->name('test');
    Route::get('/export','App\Http\Controllers\anbarController@export')->name('Bexport');
    Route::get('/export1','App\Http\Controllers\anbarController@export1')->name('Cexport');
    Route::get('/export2','App\Http\Controllers\anbarController@export2')->name('Pexport');
    Route::get('/export3','App\Http\Controllers\anbarController@export3')->name('Xexport');
    Route::get('/export4','App\Http\Controllers\anbarController@export4')->name('Shexport');
    Route::get('/export5','App\Http\Controllers\anbarController@export5')->name('Sexport');
    Route::get('/export6','App\Http\Controllers\anbarController@export6')->name('Oexport');
});




Route::group(['middleware'=>'islogin'],function(){


    Route::get('/users','App\Http\Controllers\anbarController@index7')->name('users');
    Route::post('/users','App\Http\Controllers\anbarController@ok7')->name('Ugonder');
    
    
    

    
    Route::get('/login', function () {
        return view('login');
    })-> name('login1');
    Route::post('/login','App\Http\Controllers\anbarController@login')->name('login');
    


});






