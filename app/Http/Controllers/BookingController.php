<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use App\Models\User;
use App\Models\Trip;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;


use App\Notifications\BookingNotification;


use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {

        $bookings = Booking::all();
        $notifications = collect(); 
        $users = User::all(); 
        
        foreach ($users as $user) {
            $userNotifications = $user->notifications;
            $notifications = $notifications->merge($userNotifications); 
        }

        return view('bookings.index', compact('bookings','notifications'));
    }
    public function create(Request $request)
    {
        $trip_id = $request->input('trip_id');
        $trip = Trip::findOrFail($trip_id);
        $tripName = $trip->name;
        $bookings = Booking::all();

        return view('bookings.create', compact('bookings','tripName','trip_id'));
    }

    public function store(Request $request)
{
    $booking = Booking::create($request->all());

    $users = User::all(); 
    foreach ($users as $user) {
        $user->notify(new BookingNotification($booking));
    }
    
    return redirect()->route('allpackage')->with('success', 'Your Trip is Booking Sucessfully');
}
public function showNotifications()
{
    $notifications = collect(); 
    $users = User::all(); 
    
    foreach ($users as $user) {
        $userNotifications = $user->notifications;
        $notifications = $notifications->merge($userNotifications); 
    }
    return Response::json(['notifications' => $notifications]);


}

}
