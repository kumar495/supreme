<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DestinationController;

use App\Http\Controllers\TripController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BookingController;
use App\Models\User;
use App\Http\Controllers\UserController;

use App\Http\Controllers\DoubtController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentController;


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
    return view('welcome');
})->name('welcome');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/team', function () {
    return view('ourteam');
})->name('ourteam');
Route::get('/why_us', function () {
    return view('why');
})->name('why');

Route::get('destinationName', [DestinationController::class, 'getDestinationName'])->name('getDestinationName');
Route::get('/getActivity', [DestinationController::class, 'getActivity'])->name('getActivity');
Route::get('/get-activities',[ActivityController::class, 'getActivities'])->name('get-activities');

Route::get('/getDestination/{destinationId}', [TripController::class, 'gettripByDestination'])->name('gettripByDestination');
Route::get('/getActivity/{activityId}', [TripController::class, 'gettripByActivity'])->name('gettripByActivity');

Route::get('/filter-activities', [TripController::class, 'filterbyActivties'])->name('filter-activities');

Route::get('/trip/{id}/details', [TripController::class, 'details'])->name('trip.details');
Route::post('/upload', [TripController::class, 'tripImages'])->name('ckeditor.upload');
Route::get('/getfilter', [TripController::class, 'filter'])->name('trip.filter');
Route::get('/filter', [TripController::class, 'getFilterData'])->name('getFilterData');

Route::get('/blog/{id}/details', [BlogController::class, 'details'])->name('blog.details');

Route::post('/review', [ReviewController::class, 'store'])->name('review.store');
Route::get('/review/create', [ReviewController::class, 'create'])->name('review.create');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/comments/create', [CommentController::class, 'create'])->name('comments.create');
Route::post('/doubts', [DoubtController::class, 'store'])->name('doubts.store');
Route::get('/doubts/create', [DoubtController::class, 'create'])->name('doubts.create');
Route::resource('client',ClientController::class);
Route::get('/all-packages', [TripController::class, 'allpackage'])->name('allpackage');
Route::get('/all-blogs', [BlogController::class, 'allblog'])->name('allblog');
Route::resource('bookings', BookingController::class);
Route::post('/payment', [PaymentController::class, 'call'])->name('payment');
Route::get('/payment-form', function () {
    return view('payment.payment');
});




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('destinations', DestinationController::class);
    Route::resource('activities', ActivityController::class);
    Route::resource('trip', TripController::class);
    Route::resource('testimonial',TestimonialController::class);
    Route::resource('employee', EmployeeController::class);
    Route::resource('blog', BlogController::class);
    Route::get('/review/{id}/edit', [ReviewController::class, 'edit'])->name('review.edit');
    Route::put('/review/{id}', [ReviewController::class, 'update'])->name('review.update');
    Route::get('/review/{id}', [ReviewController::class, 'show'])->name('review.show');
    Route::delete('/review/{id}', [ReviewController::class, 'destroy'])->name('review.destroy');
    Route::get('/review', [ReviewController::class, 'index'])->name('review.index');
    Route::get('/comments/{id}/edit', [CommentController::class, 'edit'])->name('comments.edit');
    Route::put('/comments/{id}', [CommentController::class, 'update'])->name('comments.update');
    Route::get('/comments/{id}', [CommentController::class, 'show'])->name('comments.show');
    Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
    Route::get('/doubts/{id}', [CommentController::class, 'show'])->name('doubts.show');
    Route::delete('/doubts/{id}', [DoubtController::class, 'destroy'])->name('doubts.destroy');
    Route::get('/doubts', [DoubtController::class, 'index'])->name('doubts.index');
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');

    Route::get('notifications', [BookingController::class, 'showNotifications'])->name('notifications');

    Route::get('markasRead', function() {
        $users = User::all();
        
        foreach ($users as $user) {
            $user->unreadNotifications->markAsRead();
        }
        
        return redirect()->back();
    })->name('markasRead');



   
});

