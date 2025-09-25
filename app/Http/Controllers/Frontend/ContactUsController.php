<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\FontendBaseController;

class ContactUsController extends FontendBaseController
{
    public function index(){
        return view('frontend.contact-us.contact');
    }
}
