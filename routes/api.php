<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\JobController;
use App\Http\Controllers\Api\ScholarshipController;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Route::apiResource('/faq', FaqController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request)
 {
    return $request->user();
});



Route::post('/register', [AuthController::class,'register'])->name('register');
Route::post('/login', [AuthController::class,'login'])->name('login');
// Route::post('/logout', [AuthController::class,'logout'])->name('logout');


Route::apiResource('/scholarship',ScholarshipController::class);
Route::apiResource('faq',FaqController::class);
Route::apiResource('jobs', JobController::class);
