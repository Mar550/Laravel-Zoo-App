<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\HasApiTokens;

class APIauth extends Controller
{
    use HasApiTokens;

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
                'password'=>Hash::make($request->password),
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
                    ],404);
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
            return response()->json([
                'error' => $validator->getMessageBag(),
                'status' => 202
            ],202);
        } 

        
        else
        {  
            $credentials = [
                'email'=> $request['email'],
                'password' => $request['password'],
            ];
            
            if (Auth::attempt($credentials))
            {
                $user = Auth::user();
                $user = auth()->user();
                $token = auth()->user()->createToken('mytoken')->accessToken;                    
                return response()->json([
                            'status'=>200,
                            'token_type'=>'Bearer',
                            'data'=>$user,
                            'token'=>$token,
                            'message'=>'Connection done !'

                        ],200);
            }

            else {
                return response()->json(['message'=>'Invalid email or password','status'=>201],201);
            }
                
        }
    }
}
