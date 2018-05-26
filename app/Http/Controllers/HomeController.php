<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Message;

use App\User;




class HomeController extends Controller
{
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
public function index()
    {



$messages = Message::orderBy('created_at', 'desc')->paginate(10);

$count_msgs = Message::orderBy('created_at', 'desc')->get()->count();

$first_id =  Message::first()->pluck('user_id');

$first_user = User::where('id', '=', $first_id)->first();

$last_id =  Message::latest()->pluck('user_id');

$last_user = User::where('id', '=', $last_id)->first();


return view('home.index')->with('messages',$messages)->with('count_msgs',$count_msgs)->with('first_user',$first_user)->with('last_user',$last_user);



}

}