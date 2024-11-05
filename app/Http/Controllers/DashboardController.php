<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function categories(){
    $categoriesData = Blog::select('category')
        ->selectRaw('count(*) as count')
        ->groupBy('category')
        ->get();

    $categories = $categoriesData->pluck('category');
    $values = $categoriesData->pluck('count');
    
    $totalBlogs = Blog::count();
    $categoryCounts=$categoriesData->pluck('count','category')->toArray();

    $recentBlogs = Blog::latest()->take(5)->get();

    $recentComments = Comment::whereNull('admin_response')
    ->take(5)
    ->get();

    return view('dashboard', compact('categories', 'values', 'totalBlogs', 'categoryCounts', 'recentBlogs','recentComments'));
}

}
