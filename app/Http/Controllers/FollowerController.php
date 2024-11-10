<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class FollowerController extends Controller
{
    public function follow(User $user){

        $follower = Auth::user();

        $follower->followings()->attach($user);

        return redirect()->route('users.show', $user->id)->with('success','Followed successfully!');

    }

    public function unfollow(User $user){

        $follower = Auth::user();

        $follower->followings()->detach($user);

        return redirect()->route('users.show', $user->id)->with('success','Unfollowed successfully!');


    }
}
