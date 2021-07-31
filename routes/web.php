<?php

use App\Http\Controllers\QuestionCategoryController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AvailabilityController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {


    Route::get('/appointments', [AppointmentController::class, 'show']);

    Route::middleware('can:create-availability,availability')->group(function () {

        Route::get('/availability', [AvailabilityController::class, 'show'])->name('availability');
        Route::get('/availability/json', [AvailabilityController::class, 'jsonFeed']);
        Route::post('/availability', [AvailabilityController::class, 'store']);
        Route::delete('/availability', [AvailabilityController::class, 'destroy']);

    });

    Route::get('/questionCategories/create', [QuestionCategoryController::class, 'create']);
    Route::post('/questionCategories', [QuestionCategoryController::class, 'store']);

    Route::get('/questionCategories/{questionCategory}', [QuestionCategoryController::class, 'show']);

    Route::get('/questionCategories/{questionCategory}/questions/create', [QuestionController::class, 'create']);
    Route::post('/questionCategories/{questionCategory}/questions', [QuestionController::class, 'store']);
    Route::delete('/questionCategories/{questionCategory}/questions/{question}', [QuestionController::class, 'destroy']);

    Route::get('/surveys/{questionCategory}-{slug}', [SurveyController::class, 'show']);
    Route::post('/surveys/{questionCategory}-{slug}', [SurveyController::class, 'store']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
