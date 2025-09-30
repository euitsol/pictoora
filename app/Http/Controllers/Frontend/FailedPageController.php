<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\FontendBaseController;

class FailedPageController extends FontendBaseController

{
    
    public function index(){
        $this->setupSEO(
            'Failed | A Story for Everyone, Tailored Just Right | Pictoora',
            'Your payment was unsuccessful. Please try again or contact support for assistance.',
            'pictoora, personalized storybooks, children books, payment failed, order unsuccessful',
        );
        return view('frontend.failed.failed');
    }
}
