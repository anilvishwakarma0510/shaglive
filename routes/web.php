<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::group([
    'prefix' => 'admin',
    'namespace' => 'App\Http\Controllers\Admin',
], function () {
    require __DIR__ . '/admin.php';
});

Route::get('/', [Controllers\HomeController::class, 'home'])->name('home');
Route::get('/home', [Controllers\HomeController::class, 'home'])->name('home');
Route::get('/terms-and-conditions', [Controllers\HomeController::class, 'terms'])->name('terms-and-conditions');
Route::get('/privacy-policy', [Controllers\HomeController::class, 'privacy'])->name('privacy-policy');
Route::get('/verify/{id}/{token}', [Controllers\AuthController::class, 'verifyEmail'])->name('verify');
Route::get('/logout', [Controllers\UserController::class, 'logout'])->name('logout');
Route::get('/state-by-country', [Controllers\UserController::class, 'getStateByCountryID'])->name('state-by-country');
Route::get('/city-by-state', [Controllers\UserController::class, 'getCityByStateID'])->name('city-by-state');

Route::group(['middleware' => ['guest']], function () {
    Route::get('/become-a-model', [Controllers\AuthController::class, 'becomeAModel'])->name('become-a-model');
    Route::get('/login', [Controllers\AuthController::class, 'login'])->name('login');
    Route::post('/login', [Controllers\AuthController::class, 'loginSubmit'])->name('loginSubmit');
    Route::post('/model-signup-step-1', [Controllers\AuthController::class, 'modelSignUpStep1'])->name('model-signup-step-1');
    Route::post('/model-signup-step-2', [Controllers\AuthController::class, 'modelSignUpStep2'])->name('model-signup-step-2');
    Route::get('/forgot-password', [Controllers\AuthController::class, 'forgotPassword'])->name('forgot-password');
    Route::post('/forgot-password', [Controllers\AuthController::class, 'SendResetPasswordLink'])->name('send-reset-password-link');
    Route::get('/reset-password/{token}', [Controllers\AuthController::class, 'ResetPassword'])->name('reset-password'); 
    Route::post('/reset-password', [Controllers\AuthController::class, 'UpdatePassword'])->name('update-password'); 
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/email-verification', [Controllers\UserController::class, 'emailPending'])->name('email-verification');
    Route::get('/pending-verification', [Controllers\UserController::class, 'verificationPending'])->name('pending-verification');
    Route::get('/resend-email-verification-link', [Controllers\UserController::class, 'resendEmailVerificationList'])->name('resend-email-verification-link');
    
});

Route::group(['middleware' => ['auth','email_verified']], function () {
    Route::get('/dashboard', [Controllers\UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [Controllers\UserController::class, 'profile'])->name('profile');
    Route::get('/change-password', [Controllers\UserController::class, 'changePassword'])->name('change-password');
    Route::post('/change-password', [Controllers\UserController::class, 'updatePassword'])->name('change-password-form');
    Route::post('/update-profile', [Controllers\UserController::class, 'updateProfile'])->name('update-profile');
    Route::get('/set-working-hours', [Controllers\UserController::class, 'setWorkingHours'])->name('set-working-hours');
    Route::post('/set-working-hours', [Controllers\UserController::class, 'updateWorkingHours'])->name('update-working-hours');
    Route::get('/my-gallery', [Controllers\GalleryController::class, 'index'])->name('my-gallery');
    Route::get('/add-gallery', [Controllers\GalleryController::class, 'addGallery'])->name('add-gallery');
    Route::get('/edit-gallery', [Controllers\GalleryController::class, 'editGallery'])->name('edit-gallery');
    Route::get('/delete-gallery', [Controllers\GalleryController::class, 'deleteGallery'])->name('delete-gallery');
    Route::post('/add-gallery', [Controllers\GalleryController::class, 'addGalleryPost'])->name('add-gallery-post');
    Route::post('/update-gallery', [Controllers\GalleryController::class, 'updateGalleryPost'])->name('update-gallery');

    Route::get('/my-video', [Controllers\VideoController::class, 'index'])->name('my-video');
    Route::get('/add-video', [Controllers\VideoController::class, 'addVideo'])->name('add-video');
    Route::get('/edit-video', [Controllers\VideoController::class, 'editVideo'])->name('edit-video');
    Route::get('/delete-video', [Controllers\VideoController::class, 'deleteVideo'])->name('delete-video');
    Route::post('/add-video', [Controllers\VideoController::class, 'addVideoPost'])->name('add-video-post');
    Route::post('/update-video', [Controllers\VideoController::class, 'updateVideoPost'])->name('update-video');
}); 

/*Route::prefix('/admin')->name('admin.')->group(function()
{
    Route::get('/', [Controllers\Admin\LoginController::class, 'signin'])->name('signin');
    
    Route::post('/do-login', [Controllers\Admin\LoginController::class, 'do_signin'])->name('do_signin');
    Route::get('/logout', [Controllers\Admin\Dashboard::class, 'logout'])->name('logout');

    Route::group(['middleware' => ['auth:admin']], function() {
    });
});*/
