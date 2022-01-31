<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite; 
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\DeliveryController; 
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
Route::get('/', [DeliveryController::class,'index'])->name('home');
Route::get('/home2', [DeliveryController::class,'home2'])->name('home2');

Route::get('/detail/{id}', [DeliveryController::class,'detail'])->name('detail');
Route::get('/cart', [DeliveryController::class,'cart'])->name('cart')->middleware('is_Users');
Route::get('/profile', [DeliveryController::class,'profile'])->name('profile')->middleware('is_Users');
Route::get('/location', [DeliveryController::class,'location'])->name('location')->middleware('is_Users'); 

Route::get('/confirm_register', [DeliveryController::class,'confirm_register'])->name('confirm_register')->middleware('is_Users');
Route::get('/sender', [DeliveryController::class,'sender'])->name('sender')->middleware('is_Users');
Route::post('updateSenderData', [DeliveryController::class, 'updateSenderData'])->name('updateSenderData.post'); 

Route::get('/checkout', [DeliveryController::class,'checkout'])->name('checkout')->middleware('is_Users', 'is_Checkout');
Route::get('/order', [DeliveryController::class,'order'])->name('order')->middleware('is_Users');
Route::get('/orderviwe/{id}', [DeliveryController::class,'orderviwe'])->name('orderviwe')->middleware('is_Users');

Route::post('addToCart', [DeliveryController::class, 'addToCart'])->name('addToCart.post'); 
Route::post('updateTocart', [DeliveryController::class, 'updateTocart'])->name('updateTocart.post'); 
Route::post('updateTocart_side_dishes', [DeliveryController::class, 'updateTocart_side_dishes'])->name('updateTocart_side_dishes.post'); 
Route::post('/removeTocart',  [DeliveryController::class, 'removeTocart'])->name('removeTocart.post'); 
Route::post('/removeTocartSideDishes',  [DeliveryController::class, 'removeTocartSideDishes'])->name('removeTocartSideDishes.post'); 


Route::post('/mrak_location',  [DeliveryController::class, 'mrak_location'])->name('mrak_location.post');  
Route::post('/ajaxsenderDeliveryForm',  [DeliveryController::class, 'ajaxsenderDeliveryForm'])->name('ajaxsenderDeliveryForm.post');
Route::post('/ajaxsenderForm',  [DeliveryController::class, 'ajaxsenderForm'])->name('ajaxsenderForm.post');
Route::post('/confirm_order',  [DeliveryController::class, 'confirm_order'])->name('confirm_order.post');
Route::post('/confrimeOrderUser',  [DeliveryController::class, 'confrimeOrderUser'])->name('confrimeOrderUser.post');
Route::post('/additionalAddress',  [DeliveryController::class, 'additionalAddress'])->name('additionalAddress.post');
Route::post('/mrakapp',  [DeliveryController::class, 'mrakapp'])->name('mrakapp.post');
// ==============================================LOGIN-SOCIAL============================================================//
 
// Google Login //
Route::get('/login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google'); 
Route::get('/login/google/callback', [LoginController::class, 'handleGoogleCallback']); 
 
// Facebook Login //
Route::get('/login/facebook', [LoginController::class, 'redirectToFacebook'])->name('login.facebook'); 
Route::get('/login/facebook/callback', [LoginController::class, 'handleFacebookCallback']);
 
// Line Login //
Route::get('/auth/liff', function () {
    return view('/auth/liff');
})->name('login.liff'); 
Route::post('/login/line', [LoginController::class, 'redirectToLine'])->name('login.line'); 