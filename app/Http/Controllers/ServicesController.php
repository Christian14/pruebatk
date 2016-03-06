<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Service;
use Auth;

class ServicesController extends Controller
{
    public function index()
    {
    	$services = Service::orderBy('id')->paginate(5);
        $userServ = Auth::user()->services;
        $data = array('services' => $services,
            'userServ' => $userServ);
    	return view('admin.services.index')->with('data',$data);
    }

    public function create()
    {
        if(Auth::user()->type == "admin"){
    	   return view('admin.services.create');
        }
        return redirect('/home');
    }

    public function store(ServiceRequest $request)
    {
        if(Auth::user()->type == "admin"){
        	$service = new Service($request->all());
        	$service->status = $request->status;
        	$service->n_inc = 0;
        	$service->save();
    	   return redirect()->route('admin.services.index');
        }
        return redirect('/home');
    }

    public function edit($id)
    {
        if(Auth::user()->type == "admin"){
        	$service = Service::findOrFail($id);

        	return view('admin.services.edit')->with('service',$service);
        }
        return redirect('/home');
    }

    public function update(ServiceRequest $request, $id)
    {
        if(Auth::user()->type == "admin"){
        	$service = Service::findOrFail($id);

        	$service->fill($request->all());

        	$service->save();

        	return redirect()->route('admin.services.index');
        }
        return redirect('/home');
    }

    public function destroy($id)
    {
        if(Auth::user()->type == "admin"){
        	$service = Service::findOrFail($id);
        	$service->delete();

        	return redirect()->route('admin.services.index');
        }
        return redirect('/home');
    }

    public function join($id)
    {
        if(Auth::user()->type == "admin"){
            $user = Auth::user();
            if(!$user->services->contains($id)){
                $user->services()->attach($id);
            }
            else
            {
                $user->services()->detach($id);
            }
            return redirect()->route('admin.services.index');
        }
        return redirect('/home');
    }
}
