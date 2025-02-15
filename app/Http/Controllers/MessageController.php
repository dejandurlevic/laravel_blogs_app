<?php

namespace App\Http\Controllers;
use App\Models\Ad;
use App\Models\Message;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function contactOwner(Request $request, $id){

        $ad = Ad::find($id);

        $ad_owner = $ad->user;
        $new_message = new Message();
        $new_message->text = $request->message;
        $new_message->sender_id = auth()->user()->id;
        $new_message->receiver_id = $ad_owner->id;
        $new_message->ad_id = $ad->id;
        $new_message->save();

        return redirect()->back()->with("msg", 'Message sent');
    }

    public function showMessage(){
        $messages = Message::where('receiver_id', auth()->user()->id)->get();
        return view('home.showMessage', ['messages'=>$messages]);
    }
}
