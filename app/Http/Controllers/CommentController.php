<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments= Comment::all();
    return view('comments.show', compact('comments'));
        
    }

    public function create()
    {
        $comments= Comment::all();
    return view('comments.create', compact('comments'));
        
    }
    /**
     * Show the form for creating a new resource.
     */
  

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
        $validatedData = $request->validated();
    
        $comment = Comment::create($validatedData);
        
        return back()->with('success', 'Thank You Comment Sent successfully.');
    }
    
    public function show(string $id)
    {
        $comments = Comment::findOrFail($id);

        return view('comments.show', compact('comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comment = Comment::findOrFail($id);

        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest  $request, string $id)
    {
        $comment = Comment::findOrFail($id);

        $validatedData = $request->validated();
        $comment->update($validatedData);
    
        return redirect()->route('comments.index')->with('success', 'Comment updated successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->route('comments.index')
            ->with('success', 'Comment deleted successfully.');
    }

   
}
