<?php

namespace App\Http\Controllers;
use App\Models\Doubt;

use Illuminate\Http\Request;

class DoubtController extends Controller
{
    
    public function index()
    {
        $doubts= Doubt::all();
    return view('inquery.show', compact('doubts'));
        
    }

    public function create()
    {
        $doubts= Doubt::all();
    return view('inquery.create', compact('doubts'));
        
    }
    /**
     * Show the form for creating a new resource.
     */
  

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'description' => 'required|string|max:1000',
        ];

    
        $validatedData = $request->validate($rules);
    
        $doubt = Doubt::create($validatedData);
    
        return back()->with('success', 'Thank You, Inquiry Sent successfully.');
    }
    
    
    public function show(string $id)
    {
        $doubts = Doubt::findOrFail($id);

        return view('inquery.show', compact('doubts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
   

    /**
     * Update the specified resource in storage.
     */
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doubt = Doubt::findOrFail($id);
        $doubt->delete();

        return redirect()->route('doubts.index')
            ->with('success', 'Inquery deleted successfully.');
    }

}
