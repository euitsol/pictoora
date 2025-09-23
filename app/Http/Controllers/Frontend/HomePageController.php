<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\FontendBaseController;

class HomePageController extends FontendBaseController
{

    public function index()
    {
        $this->setupSEO(
            'Turning Little Faces into Big Adventures | Pictoora',
            'Bring your child\'s imagination to life with fully personalized storybooks — where their face, name, and spirit become the heart of every adventure.',
            'pictoora, personalized storybooks, children books, home page, landing page',
        );
        return view('frontend.home.index');
    }
}
