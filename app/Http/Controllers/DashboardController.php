<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Material;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.home');
    }

    public function course(){
        // $course = Course:
        // return view('dashboard.course');
        $course = Course::all();
        return view('dashboard.course', compact("course"));
    }
}
