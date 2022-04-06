<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accounts;
class AccountController extends Controller
{
    public function AddNewAccount(Request $request){
        $data = array(
            'status' => 'done',
            'remarks' => $request->remarks,
            'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')
        );
    }
}
