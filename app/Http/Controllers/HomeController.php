<?php

namespace App\Http\Controllers;
use App\Models\Status;
use Illuminate\Http\Request;
// use Auth;

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
        // if not want to show own quotes in feed
        // $user = Auth::user()->id; 
        // $statuses = Status::where('user_id','!=',$user)->orderby('created_at','DESC')->get();


       // if you want to show own quotes in feed
        $statuses = Status::orderby('created_at','DESC')->paginate(5);
       
        return view('home',compact('statuses'));
    }
}
