<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostCollection;

class PostController extends Controller
{
    public function store(Request $request)
    {
      $post = new Post([
        'title' => $request->title,
        'body' => $request->body
      ]);

      $post->save();

      return response()->json('success');
    }

    public function index()
    {
      return new PostCollection(Post::all());
    }

    public function show($id)
    {
      $post = Post::find($id);
      return response()->json($post);
    }

    public function update($id, Request $request)
    {
      $post = Post::find($id);
      $post->update($request->all());

      return response()->json('successfully updated');
    }

    public function delete($id)
    {
      $post = Post::find($id);
      $post->delete();

      return response()->json('successfully deleted');
    }
}
