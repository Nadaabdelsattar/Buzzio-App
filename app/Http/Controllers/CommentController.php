<?php

namespace App\Http\Controllers;

use App\Models\Thoughts;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Thoughts $Thought){

        $comment = new Comment();
        $comment->Thought_id = $Thought->id;
        $comment->user_id = Auth::id();
        $comment->content = request()->get('content');
        $comment->save();

        return redirect()->route('Thoughts.show', $Thought->id)->with('success', "The comment posted successfully!");

    }
}
