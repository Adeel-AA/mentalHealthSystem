<?php

use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\QuestionController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/assessments/create', [AssessmentController::class, 'create']);
    Route::post('/assessments', [AssessmentController::class, 'store']);

    Route::get('/assessments/{assessment}', [AssessmentController::class, 'show']);

    Route::get('/assessments/{assessment}/questions/create', [QuestionController::class, 'create']);
    Route::post('/assessments/{assessment}/questions', [QuestionController::class, 'store']);
    Route::delete('/assessments/{assessment}/questions/{question}', [QuestionController::class, 'destroy']);

    Route::get('/surveys/{assessment}-{slug}', [SurveyController::class, 'show']);
    Route::post('/surveys/{assessment}-{slug}', [SurveyController::class, 'store']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
