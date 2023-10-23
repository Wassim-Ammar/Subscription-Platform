<?php

namespace App\Http\Controllers;

use Illuminate\Pipeline\Pipeline;

use App\Http\Controllers\PublishingPost;
use App\Http\Requests\PostRequest;
use App\Jobs\SendEmail;
use App\Models\Post;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public  function create(PostRequest $request): JsonResponse
    {
        $schedule = new Schedule();

        $pipeline = app(Pipeline::class);

        $pipeline->send($request)->through([
            $request->validated(),
            $post = Post::create($request->toArray()),
            SendEmail::dispatch($post->id),
        ]);


        return  response()->json(['message' => 'post created successfuly'], 200);
    }
}
