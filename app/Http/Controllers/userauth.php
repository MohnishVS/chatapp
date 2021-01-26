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
                    if($rec = DB::table('users')->where('name',$data['rec'])->first()){
                        $req->session()->put('user',$data['user']);
                        $req->session()->put('user_id',$user->id);
                        $req->session()->put('rec_id',$rec->id);
                        $req->session()->put('rec_name',$rec->name);
                        return redirect('index');
                    }
                    else{
                        $response = ["receiver" => "not Found"];
                    return response($response, 422);
                    }
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
