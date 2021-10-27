<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\MainController as MainController;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class RegisterationController extends MainController
{

    public function registeration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'email'    => 'required|email',
            'address'  => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        //dd($validator->errors());
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $input = $request->all();
        $input['name'] = $input['firstname'].' '.$input['firstname'];
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;
   
        return $this->sendResponse($success, 'User register successfully.');
    }

    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            $success['name'] =  $user->name;
   
            return $this->sendResponse($success, 'User login successfully.');
        } 
        else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }
    
}
