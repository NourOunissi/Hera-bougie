<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BougieController;
use App\Http\Controllers\ProduitsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('app_home');
    Route::get('/about', 'about')->name('app_about');
    Route::get('/contact', 'contact')->name('app_contact');
    Route::match (['get', 'post'], '/dashboard', 'dashboard')->middleware('auth')->name('app_dashboard');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/logout', 'logout')->name('app_logout');
    Route::get('/cancel_account', 'cancelAccount')->name('app_cancel_account');
    Route::post('/exist_email', 'existEmail')->name('app_exist_email');
    Route::match (['get', 'post'], '/activation_code/{token}', 'activationCode')->name('app_activation_code');
    Route::get('/user_checker', 'userChecker')->name('app_user_checker');
    Route::get('/resend_activation_code/{token}', 'resendActivationCode')->name('app_resend_activation_code');
    Route::get('/activation_account_link/{token}', 'activationAccountLink')->name('app_activation_account_link');
    Route::match (['get', 'post'], '/activation_account_change_email/{token}', 'ActivationAccountChangeEmail')->name('app_activation_account_change_email');
    Route::match (['get', 'post'], '/forgot_password', 'forgotPassword')->name('app_forgotpassword');
    Route::match (['get', 'post'], '/change_password/{token}', 'changePassword')->name('app_changepassword');
});

Route::controller(ProduitsController::class)->group(function () {
    Route::get('/bougie', 'bougie')->name('app_bougie');
    Route::post('/bougie', 'bougie')->name('app_bougie');
});

Route::controller(ShopController::class)->group(function () {
    Route::get('/panier', 'panier')->name('app_panier');
    Route::post('/passer-commande', 'passerCommande')->name('passer-commande');
    Route::post('/confirmation-commande', 'confirmationCommande')->name('confirmation-commande');
    Route::post('/clear-bougie-article', 'clearbougiearticle')->name('clear-bougie-article');
    Route::post('/update-item-quantity', 'updateItemQuantity')->name('updateItemQuantity');
    Route::post('/add-to-cart', 'addToCart')->name('addToCart');
});

Route::controller(BougieController::class)->group(function () {
    Route::post('/clear-bougie', 'clearbougie')->name('clear-bougie');
    Route::post('/get-total-price', 'gettotalprice')->name('gettotalprice');
});











