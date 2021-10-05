<?php

namespace App\Http\Controllers;

use App\Events\UserSubscribed;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index()
    {
        return view('newsletter.subscribe');
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:newsletter_models,email'
        ]);
        
        event(new UserSubscribed($request['email']));

        return back();
    }
}
