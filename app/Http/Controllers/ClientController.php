<?php

namespace App\Http\Controllers;
use App\Http\Requests\ClientRequest;

use Illuminate\Http\Request;
use App\Models\Client;


class ClientController extends Controller
{
    public function index()
    {

        $clients = Client::all();
        return view('clients.show', compact('clients'));
    }
    
    public function create()
    {
        return view('clients.create');
    }

    public function store(ClientRequest $request)
{
    
   
    $request->validate([
        'name' => 'required|string|max:255',
        'short' => 'required|string',
        'position' => 'required|string',
        'description' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $client = new Client;
    $client->name = $request->name;
    $client->short = $request->short;
    $client->position = $request->position;
    $client->description = $request->description;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = 'clients/';
        $image->move($imagePath, $imageName);
        $client->image = $imagePath . $imageName;
    }

    $client->save();

    return redirect()->route('client.index')->with('success', 'Client created successfully.');
    
}


    public function show($id)
    {
        $clients = Client::find($id);
    
        if (!$clients) {
            return abort(404); 
        }
    
        return view('clients.show', compact('clients'));
    }

    public function edit($id)
    {
        $client = Client::find($id);
    
        if (!$client) {
            return abort(404);
        }
    
        return view('clients.edit', compact('client'));
    }
  
    
    public function update(ClientRequest $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'short' => 'required|string',
            'position' => 'required|string',
            'description' => 'required|string',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $client = Client::find($id);
    
        if (!$client) {
            return abort(404);
        }
    
        $client->name = $request->name;
        $client->short = $request->short;
        $client->position = $request->position;
        $client->description = $request->description;
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'clients/';
            $image->move($imagePath, $imageName);
            $client->image = $imagePath . $imageName;
        }
        
        $client->save();
    
        return redirect()->route('client.index')->with('success', 'Client updated successfully.');
    }
    
    
    
    public function destroy($id)
    {
        $client = Client::find($id);
    
        if (!$client) {
            return abort(404);
        }
    
        $client->delete();
    
        return redirect()->route('client.index')->with('success', 'Clients deleted successfully.');
    }
}
