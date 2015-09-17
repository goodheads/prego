<?php

namespace Prego\Http\Controllers;

use Illuminate\Http\Request;

use Prego\Http\Requests;
use Prego\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Displays the index page of the app
     *
     * @return Response
     */
    public function index()
    {
        return view('index');
    }
}
