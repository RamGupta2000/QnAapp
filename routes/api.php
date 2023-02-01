<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;


Route::middleware('auth:api')->group(function () {

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/category', [CategoryController::class, 'index']);
    Route::post('/questions', [QuestionController::class, 'store']);
    Route::get('/questions/{lang_id}', [QuestionController::class, 'fetch']);
    Route::post('/answer/{answer_question_id}', [AnswerController::class, 'store']);
    Route::get('/answer/{ques_id}', [AnswerController::class, 'fetch']);
    Route::delete('/delete-question/{que_id}', [QuestionController::class, 'destroy']);
    Route::delete('/delete-answer/{ans_id}', [AnswerController::class, 'destroy']);
});