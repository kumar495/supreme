<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    
    public function index()
{
    $testimonials = Testimonial::all();

    return view('testimonial.show', compact('testimonials'));
}

  
    public function create()
    {
        return view('testimonial');
    }
  
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $testimonial = new Testimonial;
        $testimonial->name = $request->name;
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'uploads/testimonials/';
            $image->move($imagePath, $imageName);
            $testimonial->image = $imagePath . $imageName;
        }
    
        $testimonial->save();
    
        return redirect()->route('testimonial.index')->with('success', 'Testimonial created successfully.');
    }
    
    public function show($id)
    {
        $testimonial = Testimonial::find($id);
    
        if (!$testimonial) {
            return abort(404); 
        }
    
        return view('testimonial.show', compact('testimonial'));
    }
    public function edit($id)
{
    $testimonial = Testimonial::find($id);

    if (!$testimonial) {
        return abort(404);
    }

    return view('testimonial.edit', compact('testimonial'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $testimonial = Testimonial::find($id);

    if (!$testimonial) {
        return abort(404);
    }

    $testimonial->name = $request->name;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = 'uploads/testimonials/';
        $image->move($imagePath, $imageName);
        $testimonial->image = $imagePath . $imageName;
    }

    $testimonial->save();

    return redirect()->route('testimonial.index')->with('success', 'Testimonial updated successfully.');
}

public function destroy($id)
{
    $testimonial = Testimonial::find($id);

    if (!$testimonial) {
        return abort(404);
    }

    $testimonial->delete();

    return redirect()->route('testimonial.index')->with('success', 'Testimonial deleted successfully.');
}

    

}
