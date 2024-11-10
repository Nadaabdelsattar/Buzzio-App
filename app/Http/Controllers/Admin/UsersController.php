<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{
    public function index(){

        Gate::authorize('admin');
        $users = User::first()->paginate(5);
        return view('Admin.users.index', compact('users'));
    }
}
