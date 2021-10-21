<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PassportAuthController extends Controller
{
    

    public function register(Request $request)
    {
     
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
 
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        
       
        $access_token = $user->createToken('register access token')->accessToken;
 
        return response()->json(['user' => $user, 'token' => $access_token], 200);
    }

    public function login(Request $request) {

        //store user data
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        //check if it exists
        if( auth()->attempt($data))
        {
           $access_token = auth()->user()->createToken('login access token')->accessToken;

           return response()->json(['success' => true,'user' => auth()->user(), 'token' => $access_token],200);

            
        } else {
             return response()->json(['error' => 'unauthorized'], 200);
        }
        
    }

    public function auth_user(){
        //returns details
        return response()->json(['authenticated-user' => auth()->user()], 200);
    }
}
