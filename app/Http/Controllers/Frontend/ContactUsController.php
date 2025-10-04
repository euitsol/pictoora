<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\FontendBaseController;

class ContactUsController extends FontendBaseController
{
    public function index(){
         $this->setupSEO(
            'Contact Us | A Story for Everyone, Tailored Just Right | Pictoora',
            'Create magical stories where your child becomes the hero of their own adventure | Pictoora',
            'pictoora, personalized storybooks, children books, contact us, contact us page',
        );
        return view('frontend.contact-us.contact');
    }
}
