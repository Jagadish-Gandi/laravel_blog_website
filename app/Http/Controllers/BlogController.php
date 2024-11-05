<?php
namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::latest()->get();
        return view('blogs.index', compact('blogs'));
    }
    
    

    public function create()
    {
        return view('blogs.create'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10048', // Optional image upload
            'category' => 'required|string|max:100',
        ]);

        $blog = new Blog;
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->category=$request->category;
        $blog->user_id = auth()->id(); 

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $imageName);
            $blog->image = $imageName; 
        }
        $blog->save();
        return redirect()->route('blogs.index')->with('success', 'Blog created successfully!');
    }

    public function show(Blog $blog)
    {
        $blog = Blog::latest()->get();
        return view('blogs.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'category' => 'required|string',
        ]);

        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->category = $request->category;

        
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $imageName);
            $blog->image = $imageName; 
        }

        $blog->save();
        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully!');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully!');
    }
    public function fitness(){
        $fitness=Blog::where('category','Fitness')->get();
        return view('pages.fitness',compact('fitness'));
    }
    public function daily(){
        $daily=Blog::where('category','Daily Wellness')->get();
        return view('pages.daily',compact('daily'));
    }
    public function weight(){
        $weight=Blog::where('category','Weight Management')->get();
        return view('pages.weight',compact('weight'));
    }
    
}
