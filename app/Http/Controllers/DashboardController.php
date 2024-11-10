<?php

namespace App\Http\Controllers;

use App\Models\Thoughts;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){


        $Thoughts = Thoughts::orderBy('created_at','DESC');

        if(request()->has('search')) {

            $Thoughts = $Thoughts->where('content', 'like' ,'%' . request()->get('search', '') . '%');

        };



        return view('welcome', [
            'Thoughts' => $Thoughts ->paginate(3),
        ]);
    }
}
