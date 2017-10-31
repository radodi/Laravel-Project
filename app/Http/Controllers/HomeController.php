<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function allUsers()

    {

        dd('Access All Users');

    }

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function adminarbiter()

    {

        dd('Access Admin and Superadmin');

    }

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function arbiter()

    {

        dd('Access only Arbiters');

    }

}



