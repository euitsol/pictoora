<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\FontendBaseController;
use Illuminate\Http\Request;

class AboutPageController extends FontendBaseController
{
    public function index(){
        return view('frontend.about.about');
    }
}
