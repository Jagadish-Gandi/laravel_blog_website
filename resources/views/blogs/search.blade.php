@extends('pages.main_page')
@section('content')
<h3 class="text-center" id="search">Search Results for <span class="text-success">{{ $query }}</span></h3>

@if($blogs->isEmpty())
    <p class="text-center">No blogs found.</p>
@else
<div class="container">  
    <div class="row">
      @foreach ($blogs as $blog)
        <div class="col-md-4">
          <div class="blogcard blog-card">
            <img src="{{ asset('images/' . $blog->image) }}" alt="{{ $blog->title }}">
            <div class="card-body">
              <h2>{{ $blog->title }}</h2>
              <p>{!! Str::limit($blog->content, 150) !!}</p>
              <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-primary" id="welcome_btn">Read More</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endif
@endsection