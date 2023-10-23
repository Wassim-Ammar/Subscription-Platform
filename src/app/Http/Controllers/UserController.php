<?php

namespace App\Http\Controllers;

use Laravel\Sanctum\HasApiTokens;

use App\Models\Subscription;
use App\Models\User;
use App\Models\Website;
use Illuminate\Http\Request;
use NunoMaduro\Collision\Adapters\Phpunit\Subscribers\Subscriber;

class UserController extends Controller
{

    public function subscribe(Website $website)
    {
        auth()->user()->update(['website_id' => $website->id]);
        return  response()->json(['message' => 'user subscribed successfuly'], 200);
    }
}
