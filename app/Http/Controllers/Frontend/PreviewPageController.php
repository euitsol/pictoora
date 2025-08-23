<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\FontendBaseController;

class PreviewPageController extends FontendBaseController
{
    public function index()
    {
        $this->setupSEO(
            'Personalize Your Storybook | Pictoora',
            'Bring your child\'s imagination to life with fully personalized storybooks — where their face, name, and spirit become the heart of every adventure.',
            'pictoora, personalized storybooks, children books, home page, landing page',
        );
        return view('frontend.preview.index');
    }
}
