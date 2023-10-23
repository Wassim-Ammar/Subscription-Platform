<?php

namespace App\Http\Controllers;

use App\Mail\PostPublished;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class PublishingPost extends Controller
{
    public static function store($id): JsonResponse
    {


        $post = Post::findOrFail($id);
        $users = User::where('website_id', $post->website_id)->get();
        foreach ($users as $user) {
            Mail::to($user->email)->send(new PostPublished($post));
        }


        return  response()->json(['message' => 'Email sent successfuly'], 200);
    }
}
