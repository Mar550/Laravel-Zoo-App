<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Validation\ValidationException;

class APIauth extends Controller
{
    public function register(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name' => ['required','string','max:255'],
            'email' => ['required','email','email','max:255','unique:users'],
            'password' => ['required','string','min:8','max:255'],
        ],[
            'name.required' => 'The name is required',
            'email.required' => 'The email  is required',
            'email.email' => 'Your email should be an email',
            'email.unique' => 'This email is already taken',
            'password.min' => 'Your password should contain at least 8 characters.',
        ]);

        if ($validator->fails())
        {
            return response()->json(['error' => $validator->getMessageBag()],202);
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

    public function Login(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'email' => ['required','email','email'],
            'password' => ['required'],
        ],[
            'email.required' => 'Your email  is required',
            'email.email' => 'This field should contain an email',
            'password.required' => 'Your password is required',
        ]);


        if ($validator->fails())
        {
            return response()->json(['error' => $validator->getMessageBag()],403);
        } 
        else
        {  
            $user = User::where('email',$request->email)->first();
            
            if(!$user || Hash::check($request->password, $user->password)){
                return response()->json([
                    'status'=>403,
                    'message' => 'Invalid Credentials',
                ]);
            }
            else
            {
                $token =  $user->createToken($user->email.'_Token')->plainTextToken;
                
                return response()->json([
                    'data'=>$user,
                    'status'=>200,
                    'username'=>$user->name,
                    'token'=>$token,
                    'message'=>'Logged sucessfully'
                ]);
                
            }
        }
    }
}
