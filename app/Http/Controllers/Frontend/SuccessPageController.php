<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use App\Http\Controllers\FontendBaseController;

class SuccessPageController extends FontendBaseController
{
    //
    public function index(){
        $this->setupSEO(
            'Success | A Story for Everyone, Tailored Just Right | Pictoora',
            'Your order was successful! Thank you for choosing Pictoora for personalized storybooks.',
            'pictoora, personalized storybooks, children books, success, order successful',
        );
        return view('frontend.success.success');
    }
}
