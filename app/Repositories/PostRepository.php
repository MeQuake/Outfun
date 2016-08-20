<?php

namespace App\Repositories;

use App\User;
use App\Like;
use App\Post;

class PostRepository
{
    public function userLiked($user_id, $post_id)
    {
        $post = Post::findOrFail($post_id);
        return $post->likes->contains('user_id', $user_id);
    }

    public function saveLike($user_id, $post_id)
    {
        Like::create(['user_id' => $user_id, 'post_id' => $post_id])->save();
    }

    public function deleteLike($user_id, $post_id)
    {
        $like = Like::where('user_id', $user_id)
                    ->where('post_id', $post_id)
                    ->first();
        $like->delete();
    }

    public function getPostById($id)
    {
        return Post::findOrFail($id);
    }
}
