<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thoughts;
use Illuminate\Support\Facades\Auth;
use App\Models\User;




class ThoughtLikeController extends Controller
{
    public function like(Thoughts $Thought){

        $liker = Auth::user();

        $liker->likes()->attach($Thought);

        return redirect()->route('Dashboard')->with('success','Liked successfully!');


    }


    public function unlike(Thoughts $Thought){

        $liker = Auth::user();

        $liker->likes()->detach($Thought);

        return redirect()->route('Dashboard')->with('success','Liked successfully!');

    }
}
