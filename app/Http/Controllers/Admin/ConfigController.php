<?php

namespace Stoneworking\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Stoneworking\Http\Requests;
use Stoneworking\Http\Controllers\Controller;

class ConfigController extends Controller
{
    /**
     * Initialize ConfigController Dependencies
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Displays dashboard view
     *
     * @return Response
     */
    public function dashboard()
    {
        return view('admin/config/dashboard');
    }


}
