<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\FontendBaseController;
use Illuminate\Http\Request;

class PersonalizePageController extends FontendBaseController
{

    public function index()
    {
        $this->setupSEO(
            'Personalize Your Storybook | Pictoora',
            'Bring your child\'s imagination to life with fully personalized storybooks — where their face, name, and spirit become the heart of every adventure.',
            'pictoora, personalized storybooks, children books, home page, landing page',
        );
        return view('frontend.personalize.index');
    }

    public function preview()
    {
        return view('frontend.personalize.preview');
    }
}
