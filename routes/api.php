<?php

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\TrainingApi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\JobController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DonateMeController;
use App\Http\Controllers\Api\EducationController;
use App\Http\Controllers\Api\YouthController;
use App\Http\Controllers\Api\StartupController;
use App\Http\Controllers\Api\TrainingController;
use App\Http\Controllers\Api\VolunteerController;
use App\Http\Controllers\Api\JobRequestController;
use App\Http\Controllers\Api\ScholarshipController;
use App\Http\Controllers\Api\ScholarshipRequestController;
use App\Http\Controllers\Api\StatController;
use App\Http\Controllers\Api\UpdateProfileController;
use App\Http\Controllers\Api\VolunteerApplicationController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
// Route::post('/logout', [AuthController::class,'logout'])->name('logout');



Route::post('token-validate', [AuthController::class, 'validateToken']);

Route::get('/stat', [StatController::class, 'index']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::apiResource('/scholarship-request', ScholarshipRequestController::class)->only('store');
    Route::apiResource('/job-requests', JobRequestController::class)->only('store');
    Route::apiResource('/volunteer-applications', VolunteerApplicationController::class)->only(['index', 'store', 'show']);
    Route::put('/update-profile', [UpdateProfileController::class, 'update']);
    Route::put('/update-password', [UpdateProfileController::class, 'updatePassword']);
    Route::get('/update-profile', [UpdateProfileController::class, 'showProfile']);
    Route::put('/update-password', [UpdateProfileController::class, 'updatePassword']);
    Route::get('/education', [EducationController::class, 'showEducation']);
    Route::put('/education', [EducationController::class, 'updateEducation']);
    Route::post('/education', [EducationController::class, 'storeEducation']);
    Route::delete('/education', [EducationController::class, 'deleteEducation']);
    Route::post('/donate-me', [DonateMeController::class, 'donateMe']);
});

Route::apiResource('/scholarships', ScholarshipController::class);
Route::apiResource('faqs', FaqController::class);
Route::apiResource('jobs', JobController::class);
Route::apiResource('youths', YouthController::class);
Route::apiResource('startups', StartupController::class)->only(['index', 'show']);
Route::apiResource('volunteers', VolunteerController::class)->only(['index', 'show']);
Route::apiResource('trainings', TrainingController::class)->only(['index', 'show']);
