<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

class aboutController
{
    public function index(){
        return view('frontend.about.about');
    }
}
