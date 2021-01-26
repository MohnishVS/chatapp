<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
   function messagedisplay(Request $request){
    $users = DB::table('messages')->where('user_id', '1')->pluck('message');
       foreach ($users as $user) {
        echo $user,"<br>";
    }
   }
   function messageup(Request $request){
       DB::table('messages')->insert([
        'user_id' => $request->user_id,
        'message' => $request->message,
        "created_at" =>  \Carbon\Carbon::now(),
        "updated_at" => \Carbon\Carbon::now(),
    ]);
    return redirect('/index');
   }

}
