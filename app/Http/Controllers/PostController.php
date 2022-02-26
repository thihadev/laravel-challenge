<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use Validator;

class PostController extends Controller
{
    public function list()
    {
        $posts = Post::latest()->paginate();

        return PostResource::collection($posts);
    }
    
    public function toggleReaction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'post_id' => 'required|int|exists:posts,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 422);
        } 

        $post = Post::findOrFail($request->post_id);

        auth()->user()->likes()->toggle($post);

        $message = auth()->user()->isLiked() ? 'You like this post successfully' : 'You unlike this post successfully';

        return response()->json(['message' => $message]);
    }
}
