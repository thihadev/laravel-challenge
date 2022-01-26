<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function list()
    {
        $posts = Post::get();
        
        $data = collect();
        foreach ($posts as $post) {
            $data->add([
                'id'          => $post->id,
                'title'       => $post->title,
                'description' => $post->description,
                'tags'        => $post->tags,
                'like_counts' => $post->likes->count(),
                'created_at'  => $post->created_at,
            ]);
        }
        return response()->json([
            'data' => $data,
        ]);
    }
}
