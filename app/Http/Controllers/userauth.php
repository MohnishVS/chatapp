<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userauth extends Controller
{
    function userlogin(Request $req)
    {
        $data= $req->input();

        if($user = DB::table('users')->where('name', $data['user'])->first()){
            $dbuser = $user->name;
            $dbpass = $user->password;
            if($dbuser == $data['user']){
                if($dbpass == $data['password']){
                    $req->session()->put('user',$data['user']);
                    $req->session()->put('user_id',$user->id);
                    return redirect('index');
                }
                else{
                    $response = ["message" => "Password mismatch"];
                    return response($response, 422);
                }
            }
            else{
                $response = ["message" => "Password mismatch"];
                return response($response, 422);
            }
        }
        else{
            $response = ["message" =>'User does not exist'];
            return response($response, 422);
        }
    }
}
