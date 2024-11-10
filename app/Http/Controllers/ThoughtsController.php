<?php

namespace App\Http\Controllers;

use App\Models\Thoughts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Content;

use function Pest\Laravel\get;

class ThoughtsController extends Controller
{
    public function store(){

        $Validated = request()->validate([
            'content' => 'required|min:3|max:240'
        ]);

        $Validated['user_id'] = Auth::id();

        Thoughts::create($Validated);

        return redirect()->route('Dashboard')->with('success', 'Your thoughts created successfully!');
    }

    public function destroy(Thoughts $Thought){

        Gate::authorize('delete',$Thought);

        $Thought->delete();

        return redirect()->route('Dashboard')->with('success', 'Your thoughts deleted successfully!');

    }


    public function show(Thoughts $Thought){

        return view('Thoughts.show', compact('Thought'));

    }



    public function edit(Thoughts $Thought){

        Gate::authorize('update',$Thought);


        $editing = true;

        return view('Thoughts.show', compact('Thought', 'editing'));
    }


    public function update(Thoughts $Thought){

        Gate::authorize('update',$Thought);

        $Validated = request()->validate([
            'content' => 'required|min:3|max:240'
        ]);

        $Thought->update($Validated);

        return redirect()->route('Thoughts.show', $Thought->id)->with('success', 'Your Thoughts updated successfully');

    }
}
