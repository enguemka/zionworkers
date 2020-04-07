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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/journey', function () {
    return view('journey');
})->name('journey');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::prefix('series')->group(function () {
    Route::get('/', function () { return view('series.index'); })->name('series');
    Route::get('all', 'SeriesController@all');
    Route::get('featured', 'FeaturedSeriesController@index');
    Route::get('updated', 'UpdatedSeriesController@index');
    Route::get('{slug}', 'SeriesController@get')->name('series.get');
    Route::get('{slug}/subscribe', 'SubscriptionController@get');
    Route::post('{slug}/subscribe', 'SubscriptionController@store');
    Route::get('{slug}/watchlist', 'WatchListController@get');
    Route::post('{slug}/watchlist', 'WatchListController@store');
    Route::get('{slug}/episodes/{id}', 'PostController@show')->name('series.episode');
});

Route::prefix('news')->group(function () {
    Route::get('/', 'MessageController@index')->name('news');
    Route::get('latest', 'MessageController@latest')->name('news.latest');
    Route::get('all', 'MessageController@all')->name('news.all');
    Route::get('{message}', 'MessageController@show')->name('news.show');
});

Route::prefix('artworks')->group(function () {
    Route::get('/', 'ArtworkController@index')->name('artwork');
    Route::get('/{artwork}', 'ArtworkController@show')->name('artwork.show');
    Route::get('/{artwork}/images/{image}', 'ImageController@download')->name('artwork.download');
});

Route::prefix('subscriptions')->group(function () {
    Route::get('/', 'SubscriptionController@all')->name('subscriptions.all');
    Route::delete('/{subscription}', 'SubscriptionController@destroy')->name('subscriptions.delete');
});

Route::prefix('watchlist')->group(function () {
    Route::get('/', 'WatchListController@all')->name('watchlist.all');
    Route::delete('/{watchList}', 'WatchListController@destroy')->name('watchlist.delete');
});

Route::post('/testimonies', 'TestimonyController@store');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/search', 'SearchController@index')->name('search');

Route::prefix('my-account')->group(function () {
    Route::get('/', 'MyAccountController@index')->name('my.account.index');
    Route::post('details', 'MyAccountController@details')->name('my.account.details');
    Route::post('preferences', 'MyAccountController@preferences')->name('my.account.preferences');
    Route::post('passwords', 'MyAccountController@passwords')->name('my.account.passwords');
});
