<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class GuestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get index page for guest users
     *
     * @return Response
     */
    public function index()
    {
        return response()->view('welcome');
    }
}
