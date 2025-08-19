@extends('dashboardlayout.app')
@section('content')

<div class="container mt-4">
    <h2>Create Post</h2>

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Title -->
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter post title" required>
        </div>

        <!-- Content -->
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" placeholder="Enter post content" required></textarea>
        </div>

        <!-- Image -->
        <div class="mb-3">
            <label for="image" class="form-label">Post Image</label>
            <input class="form-control" type="file" id="image" name="image" >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>



@endsection