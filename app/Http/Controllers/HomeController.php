<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function viewProfile()
    {
        return view('profile');
    }
    public function viewAccounts()
    {
        return view('admin.accounts');
    }
    public function fetchdata(){

        $fetchdata =   DB::table('users')
        ->whereDay('created_at', now()->day)
        ->get();



       return response()->json([
           'userData'=>$fetchdata,
       ]);
   }
}
