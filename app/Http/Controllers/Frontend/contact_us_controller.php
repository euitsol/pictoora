<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

class contact_us_controller
{
    //
    public function index(){
        return view('frontend.contact_us.contact');
    }
}
