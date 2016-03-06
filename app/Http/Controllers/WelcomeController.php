<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Service;
use App\Incident;

class WelcomeController extends Controller
{
    public function index()
    {
    	$services = Service::all();
        $incidents = Incident::orderBy('created_at','desc')->paginate(5);
        $data = array(
            'services'=> $services,
            'incidents' => $incidents);
        return view('welcome')->with($data);
    }
}
