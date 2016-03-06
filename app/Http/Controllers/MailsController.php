<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MailsController extends Controller
{
    public function send()
    {
    	Mail::send('emails.test',['name' => 'christian'],function($message)
		{
			$message->to('chris_j_684@hotmail.com','Christian')->subject('Welcome!');
		});
		return redirect()->route('admin.incidents.index');
    }
}
