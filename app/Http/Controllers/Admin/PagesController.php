<?php

namespace Stoneworking\Http\Controllers\Admin;

// use Illuminate\Http\Request;

// use Stoneworking\Http\Requests;
use Stoneworking\Http\Controllers\Controller;

class PagesController extends Controller
{
    /**
     * Display the public home page
     * 
     * @return Response
     */
    public function home()
    {
      return view('public/home');
    }
}
