<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Http\Requests\UserRequest;
use Auth;

class UsersController extends Controller
{
    public function index()
    {
        if(Auth::user()->type == "admin"){
        	$users = User::orderBy('id')->paginate(5);
        	return view('admin.users.index')->with('users',$users);
        }
        return redirect('/home');
    }

    public function create()
    {
        if(Auth::user()->type == "admin"){
    	   return view('admin.users.create');
        }
        return redirect('/home');
    }

    public function store(UserRequest $request)
    {

    	$user = new User($request->all());
        if(Auth::guest())
    	   $user->type 	=	"subscriber";
        else
            $user->type =   $request->type;
    	$user->password = bcrypt($request->password);

    	$user->save();
        if(Auth::user()->type == "admin")
    	   return redirect()->route('admin.users.index');
        else
            return redirect('/home');
    }

    public function edit($id)
    {
        if(Auth::user()->type == "admin"){
        	$user = User::findOrFail($id);

        	return view('admin.users.edit')->with('user',$user);
        }
        return redirect('/home');
    }

    public function update(UserRequest $request, $id)
    {
        if(Auth::user()->type == "admin"){
        	$user = User::findOrFail($id);

        	$user->fill($request->all());
            $user->type = $request->type;
        	$user->save();

        	return redirect()->route('admin.users.index');
        }
        return redirect('/home');
    }

    public function destroy($id)
    {
        if(Auth::user()->type == "admin"){
            $user = User::findOrFail($id);
        	$user->delete();

        	return redirect()->route('admin.users.index');
        }
        return redirect('/home');
    }
}
