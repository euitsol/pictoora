<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

class faq_controller
{
    //
    public function index(){
        return view('frontend.faq.faq');
    }
}
