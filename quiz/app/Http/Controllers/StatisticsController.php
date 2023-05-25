<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index()
    {
        return view('statistics.index',[
            'users_count' => \App\Models\User::count(),
            'categories_count' => \App\Models\Category::count(),
            'questions' => \App\Models\Question::all(),
            'categories' => \App\Models\Category::all(),
        ]);
    }
}
