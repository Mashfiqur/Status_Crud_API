<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Status;
use DB;

class StatusController extends Controller
{
    public function post_status(Request $request){
      $user = Auth::user()->id;
      $post = $request->post;
      
      $status = new Status();
      $status->user_id = $user;
      $status->status = $post;
      $status->save();
      notify()->success(' Status has been posted successfully!');

      return back();
      
    }

    public function status_collection(){
        $statuses = DB::table('users')->join('statuses','statuses.user_id','users.id')->select('statuses.status','users.name')->get();
        return $statuses;
    }
}
