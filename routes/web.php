<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\HomeController;
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
    return view('home');
});

Route::middleware('auth')->group(function () {
    Route::get('/help', [HelpController::class, 'index'])->name('help');

    Route::get('/self-assessments', [SelfAssessmentController::class, 'index'])->name('self-assessments');
    Route::get('/self-assessments/show', [SelfAssessmentController::class, 'show'])->name('my-self-assessments');
    Route::get('/self-assessments/{questionCategory}', [SelfAssessmentController::class, 'showById'])->name('my-self-assessment');

    Route::get('/appointments/book', [AppointmentController::class, 'book'])->name('book-appointment');
    Route::get('/appointments', [AppointmentController::class, 'show'])->name('my-appointments');
    Route::get('/appointments/json', [AppointmentController::class, 'jsonFeed']);

    Route::post('/appointments', [AppointmentController::class, 'store']);

    Route::get('/availability/json', [AvailabilityController::class, 'jsonFeed']);

    Route::middleware('can:change-availability')->group(function () {

        Route::get('/availability', [AvailabilityController::class, 'show'])->name('availability');
        Route::post('/availability', [AvailabilityController::class, 'store']);

    });

    Route::middleware('can:change-questions')->group(function () {
        Route::get('/question-categories/create', [QuestionCategoryController::class, 'create'])->name('create-question-category');
        Route::post('/question-categories', [QuestionCategoryController::class, 'store']);
        Route::get('/question-categories/{questionCategory}/questions/create', [QuestionController::class, 'create']);
        Route::delete('/question-categories/{questionCategory}/questions/{question}', [QuestionController::class, 'destroy']);
    });


    Route::delete('/availability', [AvailabilityController::class, 'destroy']);

    Route::get('/question-categories', [QuestionCategoryController::class, 'index'])->name('view-question-categories');


    Route::get('/question-categories/{questionCategory}', [QuestionCategoryController::class, 'show']);

    Route::post('/question-categories/{questionCategory}/questions', [QuestionController::class, 'store']);

    Route::get('/surveys/{questionCategory}', [SurveyController::class, 'show'])->name('view-survey');
    Route::post('/surveys/{questionCategory}', [SurveyController::class, 'store'])->name('store-survey');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});


