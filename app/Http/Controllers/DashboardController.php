<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Message;

use App\User;

use App\Http\Requests\MessageFormRequest;

class DashboardController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }


public function index () {

$messages = Message::orderBy('created_at', 'desc')->paginate(10);

$count_msgs = Message::orderBy('created_at', 'desc')->get()->count();

$first_id =  Message::first()->pluck('user_id');

$first_user = User::where('id', '=', $first_id)->first();

$last_id =  Message::latest()->pluck('user_id');

$last_user = User::where('id', '=', $last_id)->first();

return view('messages.index')->with('messages',$messages)->with('count_msgs',$count_msgs)->with('first_user',$first_user)->with('last_user',$last_user);



}


public function postMessage(MessageFormRequest $request){


$msg = new Message;
$msg->user_id = $request->get('user_id');
$msg->title = $request->get('title');
$msg->message = $request->get('message');
$msg->save();


return redirect('/messagethanks');

}


public function messageThanks() {


return view('messagethanks.index');


}




}
