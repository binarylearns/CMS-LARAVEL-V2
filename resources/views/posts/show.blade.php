@extends('frontendlayout.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-3 overflow-hidden">

                <!-- Post Image -->
                <img src="{{ asset('uploads/' . $post->image) }}" 
                     class="card-img-top" 
                     alt="{{ $post->title }}" 
                     style="height: 350px; object-fit: cover;">

                <!-- Card Body -->
                <div class="card-body">
                    <h2 class="card-title fw-bold">{{ $post->title }}</h2>
                    <p class="text-muted mb-3">
                        Posted {{ $post->created_at->format('F j, Y') }} • 
                        Updated {{ $post->updated_at->diffForHumans() }}
                    </p>
                    <p class="card-text text-muted">
                        By <strong>{{ $post->user->name }}</strong> 

                    </p>Profile

                    <p class="card-text fs-5">
                        {{ $post->content }}
                    </p>

                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary rounded-pill mt-3">
                        ← Back to Posts
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
