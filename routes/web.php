<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\QuestionCategoryController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SelfAssessmentController;
use App\Http\Controllers\SurveyController;
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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/self-assessments', [SelfAssessmentController::class, 'index'])->name('self-assessments');
    Route::get('/self-assessments/show', [SelfAssessmentController::class, 'show'])->name('my-self-assessments');

    Route::get('/appointments', [AppointmentController::class, 'show'])->name('appointments');

    Route::middleware('can:create-availability,availability')->group(function () {

        Route::get('/availability', [AvailabilityController::class, 'show'])->name('availability');
        Route::get('/availability/json', [AvailabilityController::class, 'jsonFeed']);
        Route::post('/availability', [AvailabilityController::class, 'store']);
        Route::delete('/availability', [AvailabilityController::class, 'destroy']);

    });

    Route::get('/question-categories/create', [QuestionCategoryController::class, 'create'])->name('create-question-category');
    Route::get('/question-categories', [QuestionCategoryController::class, 'index'])->name('view-question-categories');

    Route::post('/question-categories', [QuestionCategoryController::class, 'store']);

    Route::get('/question-categories/{questionCategory}', [QuestionCategoryController::class, 'show']);
    Route::get('/question-categories/{questionCategory}/questions/create', [QuestionController::class, 'create']);
    Route::post('/question-categories/{questionCategory}/questions', [QuestionController::class, 'store']);
    Route::delete('/question-categories/{questionCategory}/questions/{question}', [QuestionController::class, 'destroy']);

    Route::get('/surveys/{questionCategory}', [SurveyController::class, 'show'])->name('view-survey');
    Route::post('/surveys/{questionCategory}', [SurveyController::class, 'store'])->name('store-survey');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});


