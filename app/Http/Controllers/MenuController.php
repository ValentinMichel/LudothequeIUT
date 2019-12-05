<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    function index(){
        return view('home.index');
    }
    function about(){
        return view('home.about');
    }
    function contact(){
        return view('home.contact');
    }
}
