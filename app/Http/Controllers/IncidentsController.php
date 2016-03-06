<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Incident;
use App\Service;
use App\User;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\IncidentRequest;

class IncidentsController extends Controller
{
    public function index()
    {   if(Auth::user()->type == "admin"){
        	$incidents = Incident::orderBy('id')->paginate(5);
        	return view('admin.incidents.index')->with('incidents',$incidents);
        }
        return redirect('/home');
    }

    public function create($id)
    {
        if(Auth::user()->type == "admin")
    	   return view('admin.incidents.create')->with('id',$id);
        return redirect('/home');
    }

    
    public function store(IncidentRequest $request)
    {
        if(Auth::user()->type == "admin"){
            $service = Service::find($request->service);
            $service->status = 'Non-Operational';
            $service->n_inc = $service->n_inc + 1;
            $service->save();
        	$incident = new Incident($request->all());
        	$incident->service()->associate($request->service);
        	$incident->save();
            $users = $service->users;
            $parameters = array('incident' => $incident,
                'users' => $users);
            
            send($parameters);
        	return redirect()->route('admin.incidents.index');
        }
        return redirect('/home');
    }

    

    public function edit($id)
    {
        if(Auth::user()->type == "admin"){
        	$incident = Incident::findOrFail($id);

        	return view('admin.incidents.edit')->with('incident',$incident);
        }
        return redirect('/home');
    }

    public function update(IncidentRequest $request, $id)
    {
        if(Auth::user()->type == "admin"){
        	$incident = Incident::findOrFail($id);

        	$incident->fill($request->all());

        	$incident->save();

        	return redirect()->route('admin.incidents.index');
        }
        return redirect('/home');
    }

    public function destroy($id)
    {
        if(Auth::user()->type == "admin"){
        	$incident = Incident::findOrFail($id);
        	$incident->delete();

        	return redirect()->route('admin.incidents.index');
        }
        return redirect('/home');
    }

    public function show($id)
    {
        if(Auth::user()->type == "admin"){
            $service = Service::findOrFail($id);
            return view('admin.incidents.show')->with('service',$service);
        }
        return redirect('/home');
    }
}

function send($parameters)
{
    $incident= $parameters["incident"];
    $service = Service::findOrFail($incident->service->id);
    $users = $parameters["users"];
    for ($i=0; $i < $users->count(); $i++) { 

        Mail::send('emails.test',['service' => $service->name,'name' => $incident->title,'body' => $incident->description],function($message) use ($users, $i){
            $message->to($users[$i]->email,$users[$i]->name)->subject('Oh no There is a problem!');
        });
    }      
}
