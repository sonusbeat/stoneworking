<?php

namespace Stoneworking\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Stoneworking\Http\Controllers\Admin\UsersController;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param $validation
     * @return UsersController
     */
    protected function redirectBackWithErrors(Array $validation)
    {
        return redirect()->back()->withInput()->withErrors($validation);
    }
}
