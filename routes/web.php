<?php

use App\Models\User;

use App\Livewire\Dashboard;
use Illuminate\Http\Request;
use App\Livewire\News\Shownews;
use App\Livewire\Startups\Show;
use App\Livewire\News\Creatnews;
use App\Livewire\Startups\Index;
use App\Livewire\TrainingsTable;
use App\Livewire\Startups\Create;
// use App\Livewire\Events\ShowEvents;
use App\Livewire\MobileApp\Version;
// use App\Livewire\Events\CreateEvents;
use Illuminate\Auth\Events\Verified;


use Illuminate\Support\Facades\Auth;
use App\Livewire\Events\CreateEvents;
use App\Livewire\Faq\Show as FaqShow;
use Illuminate\Support\Facades\Route;
use App\Livewire\Partners\ShowPartner;
use App\Livewire\Faq\Index as FaqIndex;
use App\Livewire\Jobs\Show as JobsShow;
use App\Livewire\Partners\CreatePartner;
use App\Livewire\Blogs\Show as BlogsShow;
use App\Livewire\Faq\Create as FaqCreate;
use App\Livewire\Jobs\Index as JobsIndex;
use App\Livewire\News\Index as NewsIndex;
use App\Livewire\Users\Show as UsersShow;

use App\Livewire\Youth\Show as YouthShow;
use App\Http\Controllers\ProfileController;
use App\Livewire\Blogs\Index as BlogsIndex;
use App\Livewire\Events\Show as EventsShow;

use App\Livewire\Jobs\Create as JobsCreate;
use App\Livewire\Users\Index as UsersIndex;
// use App\Livewire\Events\Show as EventsShow;
use App\Livewire\Youth\Index as YouthIndex;
use App\Livewire\Blogs\Create as BlogsCreate;
use App\Livewire\Events\Index as EventsIndex;
// use App\Livewire\Events\Index as EventsIndex;
use App\livewire\profile\Edit as EditProfile;
use App\Livewire\Subscribers\ShowSubscribers;

use App\Livewire\Users\Create as UsersCreate;

use App\Livewire\Youth\Create as YouthCreate;
use App\Livewire\Partners\Show as PartnersShow;
use App\Livewire\Sponsers\Show as SponsersShow;
use App\Livewire\Subscribers\CreateSubscribers;
use App\Livewire\Trainers\Show as TrainersShow;
use App\Livewire\Partners\Index as PartnersIndex;
use App\Livewire\Sponsers\Index as SponsersIndex;
use App\Livewire\Trainers\Index as TrainersIndex;
use App\Livewire\Trainings\Show as TrainingsShow;
use App\Livewire\Visitors\Index as VisitorsIndex;
use App\Livewire\Partners\Create as PartnersCreate;
use App\Livewire\Sponsers\Create as SponsersCreate;
use App\Livewire\Trainers\Create as TrainersCreate;
use App\Livewire\Trainings\Index as TrainingsIndex;
use App\Livewire\volunteers\Show as VolunteersShow;
use App\Livewire\Trainings\Create as TrainingsCreate;
use App\Livewire\Volunteers\Index as VolunteersIndex;
use App\Livewire\Scholarships\Show as ScholarshipsShow;
use App\Livewire\Subscribers\Index as SubscribersIndex;
use App\Livewire\Volunteers\Create as VolunteersCreate;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Livewire\Scholarships\Index as ScholarshipsIndex;

use App\Livewire\Scholarships\Create as ScholarshipsCreate;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Livewire\DonationRequest\Show as DonationRequestShow;
use App\Livewire\DonationRequest\Index as DonationRequestIndex;
use App\Livewire\ScholarshipRequest\Show as ScholarshipRequestShow;
use App\Livewire\ScholarshipRequest\Index as ScholarshipRequestIndex;
use App\Livewire\VolunteerApplication\Show as VolunteerApplicationShow;
use App\Livewire\VolunteerApplication\Index as VolunteerApplicationIndex;

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



// Auth::routes(['verify'=>true])

Route::get('welcome', function () {
    return view('email_verified');
})->name('welcome');

Route::get('/verify-email/{id}/{hash}', function ($id, $hash, Request $request) {
    $user = App\Models\User::findOrFail($id);

    if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
        abort(403);
    }

    if ($user->hasVerifiedEmail()) {
        return redirect('/welcome'); // Already verified, redirect to desired location
    }

    // Manually update the email_verified_at column
    $user->markEmailAsVerified();

    event(new Verified($user));

    return redirect('/welcome'); // Redirect to your desired location after email verification
})->name('verification.verify');


Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/dashboard', Dashboard::class)->name('dashboard');



    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
    Route::get('/changepassword', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/changepassword', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/changepassword', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', EditProfile::class);
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

    //    // route group for trainings
    Route::get('/trainings', TrainingsIndex::class)->name('trainings.index');
    Route::get('/trainings/create', TrainingsCreate::class)->name('trainings.create');
    Route::get('/trainings/{training}', TrainingsShow::class)->name('trainings.show');

    // route group for volunteers
    Route::get('/volunteers', VolunteersIndex::class)->name('volunteers.index');
    Route::get('/volunteers/create', VolunteersCreate::class)->name('volunteers.create');
    Route::get('/volunteers/{volunteer}', VolunteersShow::class)->name('volunteers.show');

    // Volunteer Applicationss route
    Route::get('/volunteerApplication', VolunteerApplicationIndex::class)->name('volunteer-application.index');
    Route::get('/volunteerApplication/{volunteerApplication}', VolunteerApplicationShow::class)->name('volunteer-application.show');

    // route group for trainers
    Route::get('/trainers', TrainersIndex::class)->name('trainers.index');
    Route::get('/trainers/create', TrainersCreate::class)->name('trainers.create');
    Route::get('/trainers/{trainer}', TrainersShow::class)->name('trainers.show');

    // route group for trainers
    Route::get('/scholarships', ScholarshipsIndex::class)->name('scholarships.index');
    Route::get('/scholarships/create', ScholarshipsCreate::class)->name('scholarships.create');
    Route::get('/scholarships/{scholarship}', ScholarshipsShow::class)->name('scholarships.show');

    //Scholarship Requests
    Route::get('/scholarshiprequest', ScholarshipRequestIndex::class)->name('scholarship-request.index');
    Route::get('/scholarshiprequest/{scholarshipRequest}', ScholarshipRequestShow::class)->name('scholarship-request.show');
    //donation Requests
    Route::get('/donationrequest', DonationRequestIndex::class)->name('donation-request.index');
    Route::get('/donationrequest/{donationRequest}', DonationRequestShow::class)->name('donation-request.show');




    // route group for news
    Route::get('/news', NewsIndex::class)->name('news.index');
    Route::get('/news/create', Creatnews::class)->name('news.create');
    Route::get('/news/{new}', Shownews::class)->name('news.shownews');

    // route group for events
    Route::get('/events', EventsIndex::class)->name('events.index');
    Route::get('/events/create', CreateEvents::class)->name('events.create-events');
    Route::get('/events/{event}', EventsShow::class)->name('events.show');
   
    //route for blogs
    Route::get('/blogs', BlogsIndex::class)->name('blogs.index');
    Route::get('/blogs/create', BlogsCreate::class)->name('blogs.create');
    Route::get('/blogs/{blog}', BlogsShow::class)->name('blogs.show'); 


    // routegroup for faqs
    Route::get('/faqs', FaqIndex::class)->name('faqs.index');
    Route::get('/faqs/create', FaqCreate::class)->name('faqs.create');
    Route::get('/faqs/{faq}', FaqShow::class)->name('faqs.show');

    // routegroup for youth
    Route::get('/youths', YouthIndex::class)->name('youth.index');
    Route::get('/youths/create', YouthCreate::class)->name('youth.create');
    Route::get('/youths/{youth}', YouthShow::class)->name('youth.show');

    // routegroup for subscribers
    Route::get('/subscribers', SubscribersIndex::class)->name('subscribers.index');
    Route::get('/subscribers/create', CreateSubscribers::class)->name('subscribers.create');
    Route::get('/subscribers/{subscriber}', ShowSubscribers::class)->name('subscribers.show');
    // route group for partners
    Route::get('/partners', PartnersIndex::class)->name('partners.index');
    Route::get('/partners/create', CreatePartner::class)->name('partners.create');
    Route::get('/partners/{partner}', ShowPartner::class)->name('partners.show-partner');
    Route::get('partners/{partner}/open-agreement', [ShowPartner::class, 'openAgreement'])->name('partners.open-agreement');

    // route group for sponsers
    Route::get('/sponsers', SponsersIndex::class)->name('sponsers.index');
    Route::get('/sponsers/create', SponsersCreate::class)->name('sponsers.create');
    Route::get('/sponsers/{sponser}', SponsersShow::class)->name('sponsers.show');
    Route::get('/sponsor/open-agreement/{id}', [SponsersShow::class, 'openAgreement'])->name('sponser.open-agreement');
    
       
    

    // Route for the mobile app version checking
    Route::get('/mobile_version', Version::class)->name('mobile_version');
});

require __DIR__ . '/auth.php';
