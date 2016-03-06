<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Service;
use App\Incident;

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
   /* public function index()
    {
        return view('home');
    }*/

    public function index()
    {
        $services = Service::all();
        $incidents = Incident::orderBy('created_at','desc')->paginate(5);
        $data = array(
            'services'=> $services,
            'incidents' => $incidents);
        return view('home')->with($data);
    }
}
