<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index($title)
    {
        return view('news',['title' => $title]);
    }
}