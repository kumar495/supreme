<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;


class BlogController extends Controller
{
    public function index()
    {

        $blogs = Blog::all();
        return view('blogs.show', compact('blogs'));
    }
    
    public function create()
    {
        return view('blogs.create');
    }

    public function store(BlogRequest $request)
{
    
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'hightlight'=>'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    $blog = new Blog;
    $blog->title = $request->title;
    $blog->hightlight = $request->hightlight;
    $blog->description = $request->description;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = 'blogs/';
        $image->move($imagePath, $imageName);
        $blog->image = $imagePath . $imageName;
    }

    $blog->save();

    return redirect()->route('blog.index')->with('success', 'Blog created successfully.');
    
}


    public function show($id)
    {
        $blogs = Blog::find($id);
    
        if (!$blogs) {
            return abort(404); 
        }
    
        return view('blogs.show', compact('blogs'));
    }

    public function edit($id)
    {
        $blog = Blog::find($id);
    
        if (!$blog) {
            return abort(404);
        }
    
        return view('blogs.edit', compact('blog'));
    }
    public function update(BlogRequest $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'hightlight'=>'required|string',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $blog = Blog::find($id);

    if (!$blog) {
        return abort(404);
    }

    $blog->title = $request->title;
    $blog->hightlight = $request->hightlight;
    $blog->description = $request->description;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = 'blogs/';
        $image->move($imagePath, $imageName);
        $blog->image = $imagePath . $imageName;
    }

    $blog->save();

    return redirect()->route('blog.index')->with('success', 'Blog updated successfully.');
}

    

    public function destroy($id)
    {
        $blog = Blog::find($id);
    
        if (!$blog) {
            return abort(404);
        }
    
        $blog->delete();
    
        return redirect()->route('blog.index')->with('success', 'Blog deleted successfully.');
    }

    public function details($id)
    {
        $blog = Blog::find($id);

        if (!$blog) {
            abort(404, 'Blog post not found');
        }

        return view('blogs.details', ['blog' => $blog]);
    }

    public function allblog()
    {
        $blogs = Blog::all();

        if (!$blogs) {
            abort(404, 'Blog post not found');
        }

        return view('blogs.allblog', ['blogs' => $blogs]);
    }

}
