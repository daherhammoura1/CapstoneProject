<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PolicyTypeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\claimStatusController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\ClientInfoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\PolicyStatusController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ChatsController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\HospitalProfileController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\SendEmailController;


use App\Models\Policy;
use Illuminate\Routing\Route as RoutingRoute;

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

Auth::routes();
Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

Route::resource('user', UserController::class);

Route::resource('policy_type', PolicyTypeController::class);
Route::get('deleteType/{id}', [PolicyTypeController::class, 'deleteType'])->name('deleteType');
Route::resource('policies', PolicyController::class);
Route::resource('roles', RoleController::class);
Route::resource('user_profile', UserProfileController::class);
Route::resource('claim_status', ClaimStatusController::class);
Route::get('delete-claim-status/{id}', [ClaimStatusController::class, 'deleteStatus'])->name('delete-claim-status');

Route::resource('policy_status', PolicyStatusController::class);
Route::get('delete-policy-status/{id}', [PolicyStatusController::class, 'deleteStatus'])->name('delete-policy-status');

Route::get('delete-policy-managemet/{id}', [PolicyController::class, 'deletePolicy'])->name('delete-policy-managemet');
Route::get('login/google', [LoginController::class, 'redirectToGoogle']);
Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback']);

Route::get('deleteRole/{id}', [RoleController::class, 'deleteRole'])->name('deleteRole');
Route::resource('claim', ClaimController::class);
Route::get('delete-claim/{id}', [ClaimController::class, 'deleteClaim'])->name('delete-claim');

Route::get('hospital-claim', [HospitalController::class, 'create'])->name('hospital-claim');
Route::post('store-claim', [HospitalController::class, 'store'])->name('store-claim');
Route::get('hospital-claim-list', [HospitalController::class, 'index'])->name('hospital-claim-list');

Route::resource('client_info', ClientInfoController::class);

Route::get('hospital-profile', [HospitalController::class, 'profile'])->name('hospital-profile');
Route::put('hospital-profile-update/{hospitalInfo}', [HospitalController::class, 'update'])->name('hospital-profile-update');



Route::get('/load-latest-messages', [MessagesController::class, 'getLoadLatestMessages'])->name('load-latest-messages');
Route::get('messages', [ChatsController::class, 'getLoadLatestMessageshMessages'])->name('messages');
Route::get('/fetch-old-messages', [MessagesController::class, 'getOldMessages'])->name('fetch-old-messages');
Route::post('/send', [MessagesController::class, 'postSendMessage'])->name('send');
Route::get('/chat', [HomeController::class, 'index'])->name('chat');


Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('auth/facebook', [FacebookController::class, 'facebookRedirect']);
Route::get('auth/facebook/callback', [FacebookController::class, 'loginWithFacebook']);

Route::get('/ClientDashboard', [UserProfileController::class, 'indexDashboard'])->name('ClientDashboard');


Route::get('/HospitalDashboard', [HospitalController::class, 'indexHospitalDashboard'])->name('HospitalDashboard');

Route::get('/send-email', [SendEmailController::class, 'index'])->name(
    'send-email'
);
Route::get('end-of-Day', [AdminController::class, 'endOfDay'])->name('end-of-Day');
