<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function showAll() {
        return view('blog.index', array(
        ));
    }
    
    public function showPost() {
        return view('blog.post', array(
        ));
    }
}
