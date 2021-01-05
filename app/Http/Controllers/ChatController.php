<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use Illuminate\Http\Request;
use App\Models\User;

class ChatController extends Controller
{
    public function index(){

        return view('chat');

        $message = ['msg'=> 'data send'];

        try {

            info('=== Hello  ========');
//            event(new ChatEvent($message, 1));
            // return response('Event has been fired Successfully!', 200)
            //       ->header('Content-Type', 'text/json');



          } catch(\Exception $e) {
             info('Error'. $e->getMessage());

             return $e;
          }
        // return view('test');
    }
    public function Send(Request $request){
        info('=== Hello  ========');
        $user = User::find(auth()->id());
        event(new ChatEvent($request->message, $user));
        return response()->json(['success'=> true]);
    }
//    public function Send(Request $request){
//        info('=== Hello  ========');
//        $user = User::find(auth()->id());
//        event(new ChatEvent($request->message, $user));
//    }
}
