<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Thoughts;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index(){

        Gate::authorize('admin');
        $TotalUsers = User::count();
        $TotalThoughts = Thoughts::count();
        return view('Admin.dashboard', compact('TotalUsers','TotalThoughts'));
    }
}
