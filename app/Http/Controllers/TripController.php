<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TripRequest;

use App\Models\Activity;
use App\Models\Destination;
use App\Models\Trip;
use Carbon\Carbon;


class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::with('destination', 'activity')->get();
        $trips = Trip::all();
        $destination_name = [];
        $activity_name = [];
    
        foreach ($trips as $trip) {
            $destination_id = $trip->destination_id;
            $activity_id = $trip->activity_id;
    
            if ($destination_id) {
                $destination = Destination::find($destination_id);
    
                if ($destination) {
                    $destination_name[] = $destination->name;
                } else {
                    $destination_name[] = "Destination not found";
                }
            } else {
                $destination_name[] = null;
            }
    
            if ($activity_id) {
                $activity = Activity::find($activity_id);
    
                if ($activity) {
                    $activity_name[] = $activity->name;
                } else {
                    $activity_name[] = "Activity not found";
                }
            } else {
                $activity_name[] = null;
            }
        }
    
        return view('trips.show', compact('trips', 'activity_name', 'destination_name'));
    }
    

    public function create()
    {
        $trips = Trip::all();
        $destinations=Destination::all();
        $activities=Activity::all();
    



return view('trips.create', compact('trips','activities' ,'destinations'));
        
        
    }
    /**
     * Show the form for creating a new resource.
     */
  

    /**
     * Store a newly created resource in storage.
     */
    public function store(TripRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'highlights' => 'required|string',
            'actual_price' => 'required|numeric',
            'discount_price' => 'required|numeric',
            'trip_day' => 'required|numeric',
            'level' => 'required|string',
            'destination_id' => 'required|string',
            'activity_id' => 'required|string',
            'description'=>'required|string',
            'arrive' => 'nullable|date_format:H:i',
            'departure' => 'nullable|date_format:H:i',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);
    
        $trip = new Trip;
        $trip->name = $request->name;
        $trip->highlights = $request->highlights;
        $trip->actual_price = $request->actual_price;
        $trip->discount_price = $request->discount_price;
        $trip->trip_day = $request->trip_day;
        $trip->level = $request->level;
        $trip->destination_id = $request->destination_id;
        $trip->activity_id = $request->activity_id;
        $trip->description = $request->description;
        $trip->arrive = $request->arrive;
        $trip->departure = $request->departure;

    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'trips/';
            $image->move($imagePath, $imageName);
            $trip->image = $imagePath . $imageName;
        }
    
        $trip->save();
    
        return redirect()->route('trip.index')->with('success', 'Trip created successfully.');
    
    }
    
    public function show(string $id)
    {
        $trips = Trip::findOrFail($id);

        return view('trips.show', compact('trips'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $trips = Trip::findOrFail($id);
        $destination_id = $trips->destination_id;

        if ($destination_id) {
            $destination_name = Destination::where('id', $destination_id)->value('name');
        
            if (!$destination_name) {
                $destination_name = "Destination not found"; 
            }
        } else {
            $destination_name = null; 
        }
        $activity_id = $trips->activity_id;

        if ($activity_id) {
            $activity_name = Activity::where('id', $activity_id)->value('name');
        
            if (!$activity_name) {
                $activity_name = "Activity not found"; 
            }
        } else {
            $activity_name = null; 
        }
return view('trips.edit', compact('trips','destination_name' ,'activity_name'));   
 }

    /**
     * Update the specified resource in storage.
     */
    public function update(TripRequest $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'highlights' => 'required|string',
            'actual_price' => 'required|numeric',
            'discount_price' => 'required|numeric',
            'trip_day' => 'required|numeric',
            'level' => 'required|string',
            'description'=>'required|string',
            'arrive' => 'nullable|date_format:H:i',
            'departure' => 'nullable|date_format:H:i',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

    $trip = Trip::find($id);

    if (!$trip) {
        return abort(404);
    }

    $trip->name = $request->name;
    $trip->highlights = $request->highlights;
    $trip->actual_price = $request->actual_price;
    $trip->discount_price = $request->discount_price;
    $trip->trip_day = $request->trip_day;
    $trip->level = $request->level;
    $trip->description = $request->description;
    $trip->arrive = $request->arrive;
    $trip->departure = $request->departure;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = 'trips/';
        $image->move($imagePath, $imageName);
        $trip->image = $imagePath . $imageName;
    }

    $trip->save();

    return redirect()->route('trip.index')->with('success', 'Trip updated successfully.');
      
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $trip = Trip::findOrFail($id);
        $trip->delete();

        return redirect()->route('trip.index')
            ->with('success', 'Trip deleted successfully.');
    }


    public function details($id)
    {
        $trip = Trip::find($id);

        if (!$trip) {
            abort(404, 'Blog post not found');
        }

        return view('trips.details', ['trip' => $trip]);
    }

    public function tripImages(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
    
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '-' . time() . '.' . $extension;
            $request->file('upload')->move(public_path('media'), $fileName);
            $url = asset('media/' . $fileName);
    
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    
        return response()->json(['uploaded' => 0, 'message' => 'No file uploaded']);
    }

    public function allpackage()
    
    {
        $trip = Trip::all();

        if (!$trip) {
            abort(404, 'Blog post not found');
        }

        return view('Package.allpackage', ['trip' => $trip]);
    }

 
    public function gettripByDestination($destinationId)
    {
        $destination = Destination::findOrFail($destinationId);
        $trips = $destination->trips;
         return view('Package.filterpackage', compact('trips'));
    }
    
    public function gettripByActivity($activityId)
    {
        $activity = Activity::findOrFail($activityId);
        $trips = $activity->trips;
         return view('Package.filterpackage', compact('trips'));
    }
    

    public function getFilterData(Request $request)
    {
        $query = Trip::query();
        
        if ($request->has('activity_id') && $request->has('destination_id') && $request->has('trip_day')) {
            $query->where('activity_id', $request->activity_id)
                  ->where('destination_id', $request->destination_id)
                  ->where('trip_day', $request->trip_day);
        } elseif ($request->has('activity_id') && $request->has('destination_id')) {
            $query->where('activity_id', $request->activity_id)
                  ->where('destination_id', $request->destination_id);
        } elseif ($request->has('activity_id')) {
            $query->where('activity_id', $request->activity_id);
        }
    
        $trips = $query->get();
    
        return view('Package.filterpackage', compact('trips'));
    }
    

    

    
    
    





    public function filter(Request $request)
    {
        $destinationName = $request->input('destination_name');
        $activityName = $request->input('activity_name');
    
        $query = "
            SELECT trips.*
            FROM trips
            JOIN destinations ON trips.destination_id = destinations.id
            JOIN activities ON trips.activity_id = activities.id
            WHERE 1 = 1
        ";
    
        $bindings = [];
    
        if ($destinationName) {
            $query .= " AND destinations.name = ?";
            $bindings[] = $destinationName;
        }
    
        if ($activityName) {
            $query .= " AND activities.name = ?";
            $bindings[] = $activityName;
        }
    
        $trips = DB::select($query, $bindings);
    
        $destinationNames = Destination::pluck('name', 'id')->toArray();
        $activityNames = Activity::pluck('name', 'id')->toArray();
    
        return view('booking', compact('trips', 'destinationNames', 'activityNames'));
    }
    public function filterbyActivties(Request $request)
    {
        $trips = Trip::with('activity')->get();
        dd($trips);        

        
    
        return view('booking', compact('trips', 'destinationNames', 'activityNames'));
    }


    
}

