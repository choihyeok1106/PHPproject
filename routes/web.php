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
    return redirect('/home');
});
Route::resource('autoships', 'AutoshipController');
Route::resource('commissions', 'CommissionController');
Route::resource('dashboard', 'DashboardController');
Route::resource('enrollment', 'EnrollmentController');
Route::resource('genealogy', 'GenealogyController');
Route::resource('home', 'HomeController');
Route::resource('orders', 'OrderController');
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

Route::get('/locale/{locale}', function ($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
})->name('locale');

Route::get('autoships/invoice', 'AutoshipController@invoice')->name('autoships.invoice');
Route::get('orders/invoice', 'OrderController@invoice')->name('orders.invoice');
Route::get('/support/faq', 'SupportController@faq')->name('support.faq');
Route::get('/support/contact', 'SupportController@contact')->name('support.contact');
Route::get('/tools/library', 'ToolController@library')->name('tools.library');
Route::get('/tools/calendar', 'ToolController@calendar')->name('tools.calendar');
Route::get('/shopping/cart', 'ShoppingController@cart')->name('shopping.cart');
Route::get('/shopping/checkout', 'ShoppingController@checkout')->name('shopping.checkout');
Route::get('/shopping/complete', 'ShoppingController@complete')->name('shopping.complete');