<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\FontendBaseController;

class OrderTrackController extends FontendBaseController
{
    public function index()
    {
        $this->setupSEO(
            'Track Your Order | A Story for Everyone, Tailored Just Right | Pictoora',
            'Easily track your personalized storybook order with our simple order tracking system | Pictoora',
            'pictoora, personalized storybooks, children books, order tracking, track order',
        );
        return view('frontend.order-track.index');
    }
}
