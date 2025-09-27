<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\FontendBaseController;

class FaqController extends FontendBaseController
{
    public function index(){
        $this->setupSEO(
            'Frequently Asked Questions | A Story for Everyone, Tailored Just Right | Pictoora',
            'Get answers to your questions about personalized storybooks and more | Pictoora',
            'pictoora, personalized storybooks, children books, faq, frequently asked questions',
        );
        return view('frontend.faq.faq');
    }
}
