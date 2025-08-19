<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        // $posts = Post::latest()->get();
        $posts = Post::with('user')->latest()->get(); // eager load user to avoid N+1
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        // Validate the form inputs
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp|max:2048',

        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $validatedData['image'] = $imageName;
        }

        // Assign the authenticated user's id
        $validatedData['user_id'] = Auth::id();

        // Create the post
        Post::create($validatedData);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
