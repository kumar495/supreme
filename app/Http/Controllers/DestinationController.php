<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DestinationRequest;

use App\Models\Destination;
use App\Models\Activity;

class DestinationController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destinations= Destination::all();
        $pageTitle = 'Explore Destination';
    $metaDescription = 'Learn about our mission and values. Discover why we are the best choice for your travel needs.';
    return view('Destination.show', compact('destinations','pageTitle','metaDescription'));
        
    }

    public function create()
    {
        $destinations= Destination::all();
    return view('Destination.create', compact('destinations'));
        
    }
    /**
     * Show the form for creating a new resource.
     */
  

    /**
     * Store a newly created resource in storage.
     */
    public function store(DestinationRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
    
        Destination::create($validatedData);
    
    
        return redirect()->route('destinations.index')
            ->with('success', 'Destination created successfully.');
    }
    
    public function show(string $id)
    {
        $destinations = Destination::findOrFail($id);

        return view('Destination.show', compact('destinations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $destinations = Destination::findOrFail($id);

        return view('Destination.edit', compact('destinations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DestinationRequest $request, string $id)
    {
        try {
            $destination = Destination::findOrFail($id);
        } catch (\Exception $exception) {
            return redirect()->route('destinations.show')->with('error', 'Destination not found.');
        }
    
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
    
        $destination->update($validatedData);
    
        return redirect()->route('destinations.index', $destination->id)
            ->with('success', 'Destination updated successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $destination = Destination::findOrFail($id);
        $destination->delete();

        return redirect()->route('destinations.index')
            ->with('success', 'Destination deleted successfully.');
    }

    public function getDestinationName()
    {
        $destinations = Destination::pluck('name');

        return view('header', compact('destinations'));

    }

    public function getActivity()
    {
        $destinationIds = Destination::pluck('id')->toArray(); 

        $activities = Activity::whereIn('destination_id', $destinationIds)
        ->select('activities.id as activity_id', 'activities.name', 'activities.destination_id', 'destinations.name as dname')
        ->join('destinations', 'activities.destination_id', '=', 'destinations.id')
        ->get();
    
    
    
        
        
        return view('header', compact('destinations'));

    }


}


