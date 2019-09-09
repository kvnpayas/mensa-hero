<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use App\Events\newMessage;

class FriendsController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

    public function get()
    {
    	$friends = User::where('id', '!=', Auth()->user()->id)->get();
    	$imgUrl = './storage/150.png';

    	return response()->json(['friends' => $friends, 'imgUrl' => $imgUrl]);
    }

    public function getMessagesFor($id)
    {
    	// $myId = Auth()->user()->id;
    	// $messages = Message::where('from', $id)->orWhere('to', $id)->get();

    	$messages = Message::where(function($q) use ($id) {
            $q->where('from', auth()->id());
            $q->where('to', $id);
        })->orWhere(function($q) use ($id) {
            $q->where('from', $id);
            $q->where('to', auth()->id());
        })
        ->get();

    	return response()->json($messages);
    }

    public function sendMessage(Request $request)
    {
    	$message = Message::create([
    		'from' => Auth()->user()->id,
    		'to' => $request['friend_id'],
    		'text' => $request['text']
    	]);

    	// $m = [
    	// 	'from' => Auth()->user()->id,
    	// 	'to' => $request['friend_id'],
    	// 	'text' => $request['text']
    	// ];
        // Message::where('from', Auth()->user()->id)->latest()->first());
        // broadcast(new newMessage($message));

    	return response()->json($message);
    }
}
