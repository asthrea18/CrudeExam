<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
class AccountController extends Controller
{
    public function AddNewAccount(Request $request){



            $User = new User;
            $User->name = $request->input('name');
            $User->username = $request->input('username');
            $User->password = Hash::make($request->input('password'));
            $User->email = $request->input('email');
            $User->role = 3;
            $User->assign=null;
            $User->created_at=Carbon::now()->format('Y-m-d H:i:s');

            $User->save();
            return response()->json([
                'status'=>200,
                'message'=>'Student Added Successfully.'
            ]);



        // if($validator->fails())
        // {
        //     return response()->json([
        //         'status'=>400,
        //         'errors'=>$validator->messages()
        //     ]);
        // }
        // else
        // {
        //     $User = new User;
        //     $User->name = $request->input('name');
        //     $User->username = $request->input('username');
        //     $User->password = $request->input('password');
        //     $User->email = $request->input('email');
        //     $User->save();
        //     return response()->json([
        //         'status'=>200,
        //         'message'=>'Student Added Successfully.'
        //     ]);
        // }
    }
}
