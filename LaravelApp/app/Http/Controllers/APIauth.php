<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;


class APIauth extends Controller
{
    public function register(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name' => ['required','string','max:255'],
            'email' => ['required','email','email','max:255','unique:users'],
            'password' => ['required','string','min:8','max:255'],
        ]);

        if ($validator->fails())
        {
            return response()->json(['Errors' => $validator->getMessageBag()]);
        }
        else
        {
            $userdata = User::create([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'password'=>Hash::make($request->input('password')),
            ]);

            $responseArray = [];
            $responseArray['token'] = $userdata->createToken('mytoken')->accessToken;
            $responseArray['name'] = $userdata->name;

            if($userdata)
            {
                return response()->json([
                    'attempted'=> $responseArray,
                    'status' => 200,
                    'token_type' => 'Bearer',
                    'message' => 'Registered successfully',
                    'expires_at' => strtotime(Carbon::parse(

                        $userdata->createToken('mytoken')->token->expires_at
                    ))
                    ],200);
                }
                else{
                    return response()->json([
                        'message' => 'Sorry something is wrong',
                        'status' => 404
                    ]);
                }    
            }
    }

    public function Login()
    {
        
    }
}
