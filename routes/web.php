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

Route::get('/',
    function () {
        return redirect('/home');
    });
Route::resource('autoships', 'AutoshipController');
Route::resource('commissions', 'CommissionController');
Route::resource('team', 'TeamController');
Route::resource('enrollment', 'EnrollmentController');
Route::resource('genealogy', 'GenealogyController');
Route::resource('home', 'HomeController');
Route::resource('orders', 'OrderController');
Route::get('products/{cat}', 'ProductController@index');
Route::resource('products', 'ProductController');
Route::resource('reports', 'ReportController');
Route::resource('account', 'AccountController');
Route::resource('login', 'LoginController');
/*Route::get('/asd',function(){
    $repNumber = 'KR100000';
   $asd = new \App\Service\RepService();
   $cvb = $asd->getRep($repNumber);
   return $cvb;
});*/

Route::get('/locale/{locale}',
    function ($locale) {
        session()->put('locale', $locale);
        return redirect()->back();
    })->name('locale');

Route::get('/invoice', 'OrderController@invoice')->name('orders.invoice');
Route::get('/logout', 'LoginController@logout')->name('login.logout');
Route::get('/support/faq', 'SupportController@faq')->name('support.faq');
Route::get('/support/contact', 'SupportController@contact')->name('support.contact');
Route::get('/tools/library', 'ToolController@library')->name('tools.library');
Route::get('/tools/calendar', 'ToolController@calendar')->name('tools.calendar');
Route::get('/shopping/cart', 'ShoppingController@cart')->name('shopping.cart');
Route::get('/shopping/checkout', 'ShoppingController@checkout')->name('shopping.checkout');
Route::get('/shopping/complete', 'ShoppingController@complete')->name('shopping.complete');

/*****
 * Ajax
 ******/
// Login Ajax
Route::post('/a/login', 'Ajax\LoginAjax@index');
Route::post('/a/forgot-password', 'Ajax\LoginAjax@forgotPassword');
// Common Ajax
Route::get('/a/common/cart-count', 'Ajax\CommonAjax@cartCount');
Route::get('/a/common/notice-count', 'Ajax\CommonAjax@noticeCount');
Route::get('/a/common/alert-count', 'Ajax\CommonAjax@alertCount');
Route::get('/a/common/message-count', 'Ajax\CommonAjax@messageCount');
// Main Ajax
Route::get('/a/home/new-alert', 'Ajax\HomeAjax@newAlert');
Route::get('/a/home/interface', 'Ajax\HomeAjax@getInterface');
Route::post('/a/home/interface', 'Ajax\HomeAjax@setInterface');
Route::post('/a/home/interface-sorting', 'Ajax\HomeAjax@sortingInterface');
Route::get('/a/home/banners', 'Ajax\HomeAjax@banners');
Route::get('/a/home/summaries', 'Ajax\HomeAjax@summaries');
Route::get('/a/home/news', 'Ajax\HomeAjax@news');
Route::get('/a/home/team-alerts', 'Ajax\HomeAjax@teamAlerts');
Route::get('/a/home/tracker', 'Ajax\HomeAjax@tracker');
Route::get('/a/home/schedules', 'Ajax\HomeAjax@schedules');
Route::get('/a/home/activities', 'Ajax\HomeAjax@activities');
Route::get('/a/home/communities', 'Ajax\HomeAjax@communities');
// Product Ajax
Route::get('/a/item/categories', 'Ajax\ItemAjax@categories');
Route::get('/a/item/items', 'Ajax\ItemAjax@items');