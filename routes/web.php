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

Auth::routes();
Route::get('/home', 'User\UserController@index');


/*Route::group(['prefix'], function() 
{*/
    Route::get('main', 'MainController@index');
    
    Route::get('admin', 'Admin\MainController@top');//管理人版ニュース一覧の表示
    Route::get('admin/news/create', 'Admin\MainController@create');//ニュースの新規作成画面の表示
    Route::post('admin/news/posts', 'Admin\MainController@store');//ニュースの投稿を保存アクション
    Route::get('admin/news/edit', 'Admin\MainController@edit');//ニュースの編集の画面の表示
    Route::post('admin/news/edit', 'Admin\MainController@update');//ニュースの編集を保存アクション
    Route::get('news', 'MainController@news');//ユーザーからのニュース表示画面

    
    Route::get('frame', 'MainController@frame')->middleware('auth');
    Route::post('frame', "MainController@store")->name('store');
    Route::get('color', 'MainController@color');
    Route::post('color', "MainController@colorstore")->name('colorstore');
        
    Route::get('color/spring', 'MainController@spring');
    Route::get('color/summer', 'MainController@summer');
    Route::get('color/autumn', 'MainController@autumn');
    Route::get('color/winter', 'MainController@winter');
    Route::post('color/add', 'MainController@add')->name('add');
    Route::get('search', 'MainController@search');

    
    Route::get('trouble', 'TroubleController@index');//お悩み一覧表示
    Route::get('trouble/create', 'TroubleController@create');//投稿フォーム
    Route::post('trouble/posts', 'TroubleController@store');//お悩み投稿処理
    Route::resource('trouble/index', 'TroubleController', ['only' => ['show']]);//お悩み詳細
     Route::Post('trouble/index',"TroubleController@addPosts")->name('addPosts');
    
    Route::resource('user', 'User\UserController', ['only'=>['index']]);//ユーザーのマイページ
    Route::get('user/create', 'User\UserController@create')->middleware('auth');
    Route::post('user/posts', 'User\UserController@store')->middleware('auth');
    Route::get('user/edit', 'User\UserController@showedit')->middleware('auth');
    Route::post('user/update', 'User\UserController@update')->name('update');

    Route::post('user/posts/favorites', 'FavoriteController@store')->name('favorites');
    Route::post('user/posts/nofavorites', 'FavoriteController@remove')->name('nofavorites');
    
    
    Route::resource('corde', 'User\UserController', ['only' => ['show']]);//コーデ詳細es
    
    Route::Post('user/corde',"User\UserController@addPost")->name('addPost');

    
//});


Route::get('/', function () {
    return view('welcome');
});

