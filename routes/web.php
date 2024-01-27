<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Livewire\Blogs\Create as BlogsCreate;
use App\Livewire\Blogs\Index as BlogsIndex;
use App\Livewire\Blogs\Show as BlogsShow;
use App\Livewire\Dashboard;
use App\Livewire\Faq\Create as FaqCreate;
use App\Livewire\Faq\Index as FaqIndex;
use App\Livewire\Faq\Show as FaqShow;
use App\Livewire\News\Creatnews;
use App\Livewire\News\Index as NewsIndex;
use App\Livewire\News\Shownews;
use App\Livewire\Partners\Create as PartnersCreate;
use App\Livewire\Partners\CreatePartner;
use App\Livewire\Partners\Index as PartnersIndex;
use App\Livewire\Partners\Show as PartnersShow;
use App\Livewire\Partners\ShowPartner;
use App\Livewire\ScholarshipList;
use App\Livewire\ScholarshipView;
use App\Livewire\Startups\Create;
use App\Livewire\Startups\Index;
use App\Livewire\Startups\Show;
use App\Livewire\Subscriber;
use App\Livewire\Subscribers\CreateSubscribers;
use App\Livewire\Subscribers\Index as SubscribersIndex;
use App\Livewire\Subscribers\ShowSubscribers;
use App\Livewire\Users\CreateUsers;
use App\Livewire\Users\Users;

// use App\Livewire\Users\Users;

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

    // route for users
    Route::get('/users', Users::class)->name('users.users');
    Route::get('/users/create', CreateUsers::class)->name('users.create');


    // Route for scholarship listing
    Route::get('scholarship-listing',ScholarshipList::class)->name('scholarship-listing');
    Route::get('scholarship-listing/{id}', ScholarshipView::class)->name('scholarship-listing.show');
    Route::get('/subscriber', Subscriber::class)->name('subscriber.index');

    // route group for startups
    Route::get('/startups', Index::class)->name('startups.index');
    Route::get('/startups/create', Create::class)->name('startups.create');
    Route::get('/startups/{startup}', Show::class)->name('startups.show');
     // route group for news
     Route::get('/news', NewsIndex::class)->name('news.index');
     Route::get('/news/create', Creatnews::class)->name('news.create');
     Route::get('/news/{new}', Shownews::class)->name('news.shownews');


    // routegroup for faqs
    Route::get('/faqs', FaqIndex::class)->name('faqs.index');
    Route::get('/faqs/create', FaqCreate::class)->name('faqs.create');
    Route::get('/faqs/{faq}', FaqShow::class)->name('faqs.show');

       // routegroup for subscribers
       Route::get('/subscribers', SubscribersIndex::class)->name('subscribers.index');
       Route::get('/subscribers/create', CreateSubscribers::class)->name('subscribers.create');
       Route::get('/subscribers/{subscriber}', ShowSubscribers::class)->name('subscribers.show');
        // route group for partners
        Route::get('/partners', PartnersIndex::class)->name('partners.index');
        Route::get('/partners/create', CreatePartner::class)->name('partners.create');
        Route::get('/partners/{partner}', ShowPartner::class)->name('partners.show-partner');
        // route group for blogs
    Route::get('/blogs', BlogsIndex::class)->name('blogs.index');
    Route::get('/blogs/create', BlogsCreate::class)->name('blogs.create');
    Route::get('/blogs/{blog}', BlogsShow::class)->name('blogs.show');



});

require __DIR__.'/auth.php';
