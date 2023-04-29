<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

use App\Models\{
    User,
    Message
};

class MessageController extends Controller
{
    public function showMessages(Request $request){
        $id = Auth::user()->id;
        $messages = Message::where('user_id_reciever', $id)->orderby('created_at', 'desc')->get();
        $count = 0;
        foreach($messages as $message) {
            $sender = User::find($message->user_id_sender);
            $message->user_sender = $sender->name;
            $message->user_sender_email = $sender->email;
            if(!$message->is_read) $count++;
        }
        return view('showMessages', compact('messages', 'count'));
    }
    public function createMessage(Request $request){
        $reciever = User::where('email', $request->email)->first();
        Message::create([
            'user_id_sender'=>Auth::user()->id,
            'user_id_reciever'=>$reciever->id,
            'text'=>$request->text,
            'is_read'=>false
        ]);
        return redirect('/profile');
    }
    public function showProfile(){
        $id = Auth::user()->id;
        $messages = Message::where('user_id_reciever', $id)->get();
        $count = 0;
        foreach($messages as $message) {
            if(!$message->is_read) $count++;
        }
        return view('profile', compact('count'));
    }
    public function messageForm(){
        $id = Auth::user()->id;
        $messages = Message::where('user_id_reciever', $id)->get();
        $count = 0;
        foreach($messages as $message) {
            if(!$message->is_read) $count++;
        }
        return view('messageForm', compact('messages', 'count'));
    }
    public function answer(Request $request){
        $request->session()->flash('senderEmail', $request->email);
        return redirect('/sendMessage');
    }

    public function index(){
        $id = Auth::user()->id;
        $messages = Message::where('user_id_reciever', $id)->get();
        $count = 0;
        foreach($messages as $message) {
            if(!$message->is_read) $count++;
        }
        return view('profile', compact('count'));
    }
}
