@extends('layouts.app')
@section('content')
<div class="container">
  <h3 class="text-center text-muted mb-4">Admin Dashboard</h3>
  
  <div class="row">
    <!-- Pie Chart Panel -->
    <div class="col-lg-6 mb-4">
      <div class="card">
        <div class="card-header text-center">
          Blog Categories
        </div>
        <div class="card-body">
          <canvas id="myChart" style="width:100%; max-width:600px;"></canvas>
        </div>
      </div>
    </div>

    <!-- Example Panel 2: Statistics -->
    <div class="col-lg-6 mb-4">
      <div class="card">
        <div class="card-header text-center">
          Statistics
        </div>
        <div class="card-body">
          <p>Total Blogs: {{ $totalBlogs ?? 'N/A' }}</p>
          @foreach($categoryCounts as $category => $count)
            <p>{{ $category }}: {{ $count }}</p>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <!-- Example Panel 3: Recent Blogs -->
    <div class="col-lg-6 mb-4">
      <div class="card">
        <div class="card-header text-center">
          Recent Blogs
        </div>
        <div class="card-body">
          <ul>
            @foreach($recentBlogs ?? [] as $blog)
              <li>{{ $blog->title }} - {{ $blog->created_at->format('M d, Y') }}</li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
    <div class="col-lg-6 mb-4">
      <div class="card">
          <div class="card-header text-center">
              Recent Comments
          </div>
          <div class="card-body">
              @if($recentComments->isEmpty())
                  <p>No comments available.</p>
              @else
                  <ul class="list-unstyled">
                      @foreach($recentComments as $comment)
                          <li>
                              <strong>{{$comment->name}}:</strong>
                              <em>{{$comment->message}}</em>
                          </li>                          
                      @endforeach
                  </ul>
              @endif
          </div>
      </div>
  </div>
  
  </div>
  
</div>

<!-- Chart.js Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<script>
    var xValues = @json($categories);
    var yValues = @json($values);
    var barColors = [ "#00aba9", "#2b5797", "#e8c3b9", "#1e7145"];

    new Chart("myChart", {
        type: "pie",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            title: {
                display: true,
                text: "Blog Categories"
            }
        }
    });
</script>
@endsection
