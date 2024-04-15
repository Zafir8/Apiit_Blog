<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $categories = Category::whereHas('posts', function ($query) {
            $query->published(); // Assumes published scope checks 'is_approved'
        })->take(10)->get();

        return view('posts.index', compact('categories'));
    }


    public function show(Post $post)
    {

        return view(
            'posts.show',
            [
                'post' => $post
            ]
        );
    }

    public function approve($id)
    {
        $post = Post::findOrFail($id);

        if (!Auth::user()->isAdmin()) {
            return abort(403, 'Unauthorized action.');
        }

        $post->is_approved = true;
        $post->save();

        return redirect()->route('admin.posts.index')->with('message', 'Post approved successfully.');
    }

}
