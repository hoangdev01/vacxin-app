<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VaccineController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SendEmailController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Symfony\Component\HttpFoundation\Request;

Route::get('/token', function () {
	return csrf_token(); 
});

Route::get('/welcome', function () {
	return view('test');
});

Route::get('', function() {
	return view('pages.home');
});

Auth::routes(['verify' => true]);
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('send-email', [SendEmailController::class, 'index']);

// Route::get('', function() {
// 	return view('pages.home');
// });

Route::get('price-list', function() {
	return view('pages.price-list');
});
Route::get('news', [PostController::class, "allPost"]
);
Route::get('news/{id}', [PostController::class, "show"]);
Route::get('vaccine', [VaccineController::class, "getVaccine"])->name('vaccine');
Route::post('/upload', [VaccineController::class, "uploadImg"]);
Route::get('vaccine-register', [CustomerController::class, "registerView"]);
Route::post('post-register', [CustomerController::class, "registerPost"]);
Route::get('get-register', [CustomerController::class, "registerGet"]);

Route::group(['middleware'=>['auth']], function(){
	Route::prefix('admin')->group(function(){
		Route::get('/', function(){
			return view('admin.dashboard');
		});
		Route::prefix('vaccine')->group(function(){
			Route::get('', [VaccineController::class, 'allVaccine']);
			Route::get('create', [VaccineController::class, 'create']);
			Route::post('store', [VaccineController::class, 'store']);
			Route::get('/edit/{id}', [VaccineController::class, 'edit']);
			Route::post('/update/{id}', [VaccineController::class, 'update']);
			Route::delete('/delete/{id}', [VaccineController::class, 'delete']);
		});
		Route::prefix('post')->group(function(){
			Route::get('', [PostController::class, 'getPost']);
			Route::get('create', [PostController::class, 'create']);
			Route::post('store', [PostController::class, 'store']);
			Route::get('/edit/{id}', [PostController::class, 'edit']);
			Route::post('/update/{id}', [PostController::class, 'update']);
			Route::delete('/delete/{id}', [PostController::class, 'delete']);
		});
		Route::prefix('order')->group(function(){
			Route::get('', [OrderController::class, 'getOrder']);
			Route::get('/change/{id}', [OrderController::class, 'changeState']);
			Route::post('/change/update/{id}', [OrderController::class, 'updateState']);
			Route::get('create', [OrderController::class, 'create']);
			Route::post('store', [OrderController::class, 'store']);
			Route::get('/edit/{id}', [OrderController::class, 'edit']);
			Route::post('/update/{id}', [OrderController::class, 'update']);
		});
		Route::prefix('user')->group(function(){
			Route::get('', [UserController::class, 'getUser']);
			Route::get('/change/{id}', [UserController::class, 'changeRole']);
			Route::post('/change/update/{id}', [UserController::class, 'updateRole']);
			Route::get('create', [UserController::class, 'create']);
			Route::post('store', [UserController::class, 'store']);
			Route::get('/edit/{id}', [UserController::class, 'edit']);
			Route::post('/update/{id}', [UserController::class, 'update']);
			Route::delete('/delete/{id}', [UserController::class, 'delete']);
		});
	});
});
