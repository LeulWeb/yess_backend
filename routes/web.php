<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Livewire\Dashboard;
use App\Livewire\Faq;
use App\Livewire\ScholarshipList;
use App\Livewire\ScholarshipView;
use App\Livewire\Subscriber;
use App\Livewire\Users;

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

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware(['auth','role:admin'])->group(function (){

    Route::get('/dashboard', Dashboard::class)->name('dashboard');



    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route for faq
    Route::get('/faq', Faq::class  )->name('faq.index');
    // route for users
    Route::get('/users', Users::class)->name('users');


    // Route for scholarship listing
    Route::get('scholarship-listing',ScholarshipList::class)->name('scholarship-listing');
    Route::get('scholarship-listing/{id}', ScholarshipView::class)->name('scholarship-listing.show');
    Route::get('/subscriber', Subscriber::class)->name('subscriber.index');

});

require __DIR__.'/auth.php';
