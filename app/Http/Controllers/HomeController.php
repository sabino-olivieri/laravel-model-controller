<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Movie;

class HomeController extends Controller
{
    public function index() {
        $movieList = Movie::all();

        return view('home', compact('movieList'));
    }
}
