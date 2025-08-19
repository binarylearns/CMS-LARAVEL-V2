@extends('frontendlayout.app')

@section('content')
@php
use Illuminate\Support\Str;
@endphp

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div>
        <br>
        <br>

        
        @foreach ($posts as $post)
            <div class="card mb-4 shadow-lg border-0 rounded-3" style="max-width: 540px; margin: 0 auto;">
                <div class="row g-0">
                    <!-- Image -->
                    <div class="col-md-4">
                        <img src="{{ asset('uploads/' . $post->image) }}" 
                             class="img-fluid rounded-start" 
                             alt="{{ $post->title }}"
                             style="height: 100%; object-fit: cover;">
                    </div>

                    <!-- Card Content -->
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $post->title }}</h5>
                                    <p class="card-text text-muted">
                                        By <strong>{{ $post->user->name }}</strong> 
                                        • Updated {{ $post->updated_at->diffForHumans() }}
                                    </p>
                            <p class="card-text text-muted">
                                {{ Str::limit($post->content, 100, '...') }}
                            </p>

                            <a href="{{ route('posts.show', $post->id) }}" 
                               class="btn btn-primary btn-sm">
                                Read More
                            </a>

                            
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
</code>