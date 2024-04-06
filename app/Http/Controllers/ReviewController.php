<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Trip;
use App\Http\Requests\ReviewRequest;


class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        $tripNames = [];
        
        foreach ($reviews as $review) {
            $trip = Trip::find($review->trip_id);
        
            if ($trip) {
                $tripNames[$review->trip_id] = $trip->name; 
            } else {
                $tripNames[$review->trip_id] = 'Unknown Trip';
            }
        }
        
        return view('reviews.show', compact('reviews', 'tripNames'));
        
        
    }

    public function create()
    {
        $reviews = Review::all();
        $trips=Trip::all();
    return view('reviews.create', compact('reviews','trips'));
        
    }
    /**
     * Show the form for creating a new resource.
     */
  

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReviewRequest $request)
    {
        $validatedData = $request->validate([
            'trip_id' => 'required|string',
            'content' => 'required|string',
            'name' => 'required|string',
            'rating' => 'required|string',
            'email' => 'required|string',
            'address' => 'required|string',
            'title' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',


        ]);
        $review = new Review;
        $review->trip_id = $request->trip_id;
        $review->content = $request->content;
        $review->name = $request->name;
        $review->rating = $request->rating;
        $review->email = $request->email;
        $review->address = $request->address;
        $review->title = $request->title;
     
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'reviews/';
            $image->move($imagePath, $imageName);
            $review->image = $imagePath . $imageName;
        }
    
        $review->save();
        return back()->with('success', 'Thank You Review Sent successfully.');

    }
    
    public function show(string $id)
    {
        $reviews = Review::findOrFail($id);

        return view('reviews.show', compact('reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $reviews = Review::findOrFail($id);
        $trips=Trip::all();
        $trip_id = $reviews->trip_id;

        if ($trip_id) {
            $trip_name = Trip::where('id', $trip_id)->value('name');
        
            if (!$trip_name) {
                $trip_name = "Trip not found"; 
            }
        } else {
            $trip_name = null; 
        }
    
        return view('reviews.edit', compact('reviews','trip_name','trips','trip_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReviewRequest $request, string $id)
    {
        try {
            $review = Review::findOrFail($id);
        } catch (\Exception $exception) {
            return redirect()->route('review.show')->with('error', 'Review not found.');
        }
        $validatedData = $request->validate([
            'content' => 'required|string',
            'name' => 'required|string',
            'rating' => 'required|string',
            'email' => 'required|string',
            'address' => 'required|string',
            'title' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',


        ]);
        $review = Review::find($id);

    if (!$review) {
        return abort(404);
    }
    $review->content = $request->content;
    $review->name = $request->name;
    $review->rating = $request->rating;
    $review->email = $request->email;
    $review->address = $request->address;
    $review->title = $request->title;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = 'reviews/';
        $image->move($imagePath, $imageName);
        $review->image = $imagePath . $imageName;
    }

    $review->save();

    
        return redirect()->route('review.index', $review->id)
            ->with('success', 'Review updated successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('review.index')
            ->with('success', 'Review deleted successfully.');
    }
     
}
