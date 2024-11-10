<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Models\User;



class UserController extends Controller
{



    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $Thoughts = $user->thought()->paginate(5);
        return view('users.show',compact('user','Thoughts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        Gate::authorize('update',$user);
        $editing = true;
        $Thoughts = $user->thought()->paginate(5);
        return view('users.edit', compact('user','editing','Thoughts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        Gate::authorize('update',$user);
        $validated = request()->validate([
            'name' => 'required|min:3|max:40',
            'bio' => 'nullable|min:1|max:255',
            'image' => 'image'
        ]);

        if(request()->has('image')){
            $imagePath = request()->file('image')->store('profile','public');
            $validated['image'] = $imagePath;

            Storage::disk('public')->delete($user->image ?? '');



        }

        $user->update($validated);

        return redirect()->route('profile');

    }


    public function profile(User $user){

        $user = Auth::user();

        return $this->show($user);

    }


}
