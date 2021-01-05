<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\TestEvent;
use App\Models\User;

class TestController extends Controller
{
    public function index(){

        $p = ['msg'=> 'data send'];

        try {

            info('=== Hello  ========');
            event(new TestEvent($p));
            // return response('Event has been fired Successfully!', 200)
            //       ->header('Content-Type', 'text/json');

            return view('chat');

          } catch(\Exception $e) {
             info('Error'. $e->getMessage());

             return $e;
          }
        // return view('test');
    }
}
