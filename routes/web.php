<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Livewire\Blogs\Create as BlogsCreate;
use App\Livewire\Blogs\Index as BlogsIndex;
use App\Livewire\Blogs\Show as BlogsShow;
use App\Livewire\Dashboard;
use App\Livewire\Events\CreateEvents;
use App\Livewire\Events\Index as EventsIndex;
use App\Livewire\Events\Show as EventsShow;
// use App\Livewire\Events\ShowEvents;
use App\Livewire\Faq\Create as FaqCreate;
use App\Livewire\Faq\Index as FaqIndex;
use App\Livewire\Faq\Show as FaqShow;
use App\Livewire\Jobs\Create as JobsCreate;
use App\Livewire\Jobs\Index as JobsIndex;
use App\Livewire\Jobs\Show as JobsShow;
use App\Livewire\News\Creatnews;
use App\Livewire\News\Index as NewsIndex;
use App\Livewire\News\Shownews;
use App\Livewire\Partners\Create as PartnersCreate;
use App\Livewire\Partners\CreatePartner;
use App\Livewire\Partners\Index as PartnersIndex;
use App\Livewire\Partners\Show as PartnersShow;
use App\Livewire\Partners\ShowPartner;
use App\Livewire\Scholarship\Create as ScholarshipCreate;
use App\Livewire\Scholarship\Edit;
use App\Livewire\Scholarship\ScholarshipList;
use App\Livewire\Scholarship\ScholarshipView;
use App\Livewire\Sponsers\Create as SponsersCreate;
use App\Livewire\Sponsers\Index as SponsersIndex;
use App\Livewire\Sponsers\Show as SponsersShow;
use App\Livewire\Startups\Create;
use App\Livewire\Startups\Index;
use App\Livewire\Startups\Show;

use App\Livewire\Subscribers\CreateSubscribers;
use App\Livewire\Subscribers\Index as SubscribersIndex;
use App\Livewire\Subscribers\ShowSubscribers;
use App\Livewire\Trainers\Create as TrainersCreate;
use App\Livewire\Trainers\Index as TrainersIndex;
use App\Livewire\Trainers\Show as TrainersShow;
use App\Livewire\Users\Create as UsersCreate;
use App\Livewire\Users\Index as UsersIndex;
use App\Livewire\Users\Show as UsersShow;
use App\Livewire\Visitors\Index as VisitorsIndex;
use App\Livewire\Volunteers\Create as VolunteersCreate;
use App\Livewire\Volunteers\Index as VolunteersIndex;
use App\Livewire\volunteers\Show as VolunteersShow;



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

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/dashboard', Dashboard::class)->name('dashboard');



    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');




    // Route for scholarship listing
    Route::get('scholarship-listing', ScholarshipList::class)->name('scholarship-listing');
    Route::get('scholarship/create', ScholarshipCreate::class)->name('scholarship.create');
    Route::get('scholarship-listing/{id}', ScholarshipView::class)->name('scholarship-listing.show');
    Route::get('/scholarships/{scholarshipId}/edit', Edit::class)->name('scholarship.edit');



    // route group for startups
    Route::get('/startups', Index::class)->name('startups.index');
    Route::get('/startups/create', Create::class)->name('startups.create');
    Route::get('/startups/{startup}', Show::class)->name('startups.show');

    // route group for users
    Route::get('/users', VisitorsIndex::class)->name('users.index');
    Route::get('/users/{user}', UsersShow::class)->name('users.show');

    // route group for jobs
    Route::get('/jobs', JobsIndex::class)->name('jobs.index');
    Route::get('/jobs/create', JobsCreate::class)->name('jobs.create');
    Route::get('/jobs/{job}', JobsShow::class)->name('jobs.show');

    // route group for volunteers
    Route::get('/volunteers', VolunteersIndex::class)->name('volunteers.index');
    Route::get('/volunteers/create', VolunteersCreate::class)->name('volunteers.create');
    Route::get('/volunteers/{volunteer}', VolunteersShow::class)->name('volunteers.show');

    // route group for trainers
    Route::get('/trainers', TrainersIndex::class)->name('trainers.index');
    Route::get('/trainers/create', TrainersCreate::class)->name('trainers.create');
    Route::get('/trainers/{trainer}', TrainersShow::class)->name('trainers.show');


    // route group for news
    Route::get('/news', NewsIndex::class)->name('news.index');
    Route::get('/news/create', Creatnews::class)->name('news.create');
    Route::get('/news/{new}', Shownews::class)->name('news.shownews');

    // route group for events
    Route::get('/events', EventsIndex::class)->name('events.index');
    Route::get('/events/create', CreateEvents::class)->name('events.create-events');
    Route::get('/events/{event}', EventsShow::class)->name('events.show');


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

    // route group for sponsers
    Route::get('/sponsers', SponsersIndex::class)->name('sponsers.index');
    Route::get('/sponsers/create', SponsersCreate::class)->name('sponsers.create');
    Route::get('/sponsers/{sponser}', SponsersShow::class)->name('sponsers.show');
    // route group for blogs
    Route::get('/blogs', BlogsIndex::class)->name('blogs.index');
    Route::get('/blogs/create', BlogsCreate::class)->name('blogs.create');
    Route::get('/blogs/{blog}', BlogsShow::class)->name('blogs.show');
});

require __DIR__ . '/auth.php';
