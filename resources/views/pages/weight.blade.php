@extends('pages.main_page')
@section('content')
<div class="row">
    <h4 class="text-center text-muted" id="category_title">Weight Management</h4>
    @foreach ($weight as $blog)
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
@endsection