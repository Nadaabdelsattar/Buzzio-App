<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Thoughts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ThoughtsController extends Controller
{
    public function index(){

        Gate::authorize('admin');
        $Thoughts = Thoughts::first()->paginate(5);
        return view('Admin.Thoughts.index', compact('Thoughts'));
    }
}
