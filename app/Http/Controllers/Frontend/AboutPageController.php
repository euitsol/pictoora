<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\FontendBaseController;
use Illuminate\Http\Request;

class AboutPageController extends FontendBaseController
{
    public function index(){
         $this->setupSEO(
            'The ultimate policeman | A Story for Everyone, Tailored Just Right | Pictoora',
            'Create magical stories where your child becomes the hero of their own adventure | Pictoora',
            'pictoora, personalized storybooks, children books, books page, books landing page, products page',
        );
        return view('frontend.about.about');
    }
}
