<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thoughts;
use Illuminate\Support\Facades\Auth;


class FeedController extends Controller
{
    public function __invoke()
    {

        $followingIDs = Auth::user()->followings()->pluck('user_id');

        $Thoughts = Thoughts::whereIn('user_id',$followingIDs)->latest();

        if(request()->has('search')) {

            $Thoughts = $Thoughts->where('content', 'like' ,'%' . request()->get('search', '') . '%');

        };

        return view('feed', [
            'Thoughts' => $Thoughts ->paginate(3)
        ]);
    }
}
