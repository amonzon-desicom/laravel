<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    function login(Request $request){

        $data = $request->json()->all();

        $user = User::where('email',$data['email'])->first();

        if($user){
            if(Hash::check($data['password'],$user->password)){
                return response()->json(["status"=>200,"data"=>$user],200);
            }
        }

        return response()->json(["status"=>401,"data"=>'Permiso denegado'],401);

    }
}
