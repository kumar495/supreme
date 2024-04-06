<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ActivityRequest;

use App\Models\Activity;
use App\Models\Destination;

class ActivityController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities= Activity::all();
        $pageTitle = 'Explore Activity';
        $metaDescription = 'nepal, bhutan , travel, treking ';
    return view('Activity.show', compact('activities','pageTitle','metaDescription'));
        
    }

    public function create()
    {
        $activities= Activity::all();
        $destinations=Destination::all();
    return view('Activity.activityform', compact('activities','destinations'));
        
    }
    /**
     * Show the form for creating a new resource.
     */
  

    /**
     * Store a newly created resource in storage.
     */
    public function store(ActivityRequest $request)
    {
        $validatedData = $request->validate([
            'destination_id'=>'required',
            'name' => 'required',
            'description' => 'required',

        ]);
    
        Activity::create($validatedData);
    
    
        return redirect()->route('activities.index')
            ->with('success', 'Activity created successfully.');
    }
    
    public function show(string $id)
    {
        $activities = Activity::findOrFail($id);

        return view('Activity.show', compact('activities'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $activities = Activity::findOrFail($id);
        $destination_id = $activities->destination_id;

        if ($destination_id) {
            $destination_name = Destination::where('id', $destination_id)->value('name');
        
            if (!$destination_name) {
                $destination_name = "Destination not found"; 
            }
        } else {
            $destination_name = null; 
        }
        return view('Activity.edit', compact('activities','destination_name'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ActivityRequest $request, string $id)
    {
        try {
            $activity = Activity::findOrFail($id);
        } catch (\Exception $exception) {
            return redirect()->route('activities.show')->with('error', 'Activity not found.');
        }
    
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
    
        $activity->update($validatedData);
    
        return redirect()->route('activities.index', $activity->id)
            ->with('success', 'Activity updated successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();

        return redirect()->route('activities.index')
            ->with('success', 'Destination deleted successfully.');
    }
    public function getActivities(Request $request)
    {
        $destinationId = $request->input('destination_id');
        $activities = Activity::where('destination_id', $destinationId)->get();

        return response()->json(['activities' => $activities]);
    }
     
}


