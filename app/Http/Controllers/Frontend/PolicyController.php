<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\FontendBaseController;


class PolicyController extends FontendBaseController
{
    public function index(){
         $this->setupSEO(
            'Policy | A Story for Everyone, Tailored Just Right | Pictoora',
            'Create magical stories where your child becomes the hero of their own adventure | Pictoora',
            'pictoora, personalized storybooks, children books, policy page, policy, privacy policy, privacy policy page, return policy, return policy page, refund policy, refund policy page',
        );
        return view('frontend.policy.policy');
    }
}
