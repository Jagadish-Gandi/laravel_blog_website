<?php
namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request; 

class userController extends Controller
{
    public function users()
    {
        $blogs = Blog::latest()->simplePaginate(9);
        return view('welcome', compact('blogs'));
    }

    public function users_show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.show', compact('blog'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        
        // Search for blogs based on title, description, or any other column
        $blogs = Blog::where('title', 'LIKE', "%{$query}%")
                     ->orWhere('content', 'LIKE', "%{$query}%")
                     ->get();

        // Return the results to a view
        return view('blogs.search', compact('blogs', 'query'));
    }
}
