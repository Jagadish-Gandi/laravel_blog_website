@extends('pages.main_page')
@section('content')
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
  <div class="row mb-5" id="pagination">
    <div class="col text-center">
      {{ $blogs->links() }}
    </div>
  </div>
</div>

@endsection