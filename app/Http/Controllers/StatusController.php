<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use App\Models\Users;
use Auth;
class StatusController extends Controller
{
    public function postStatus(Request $request){

      $this->validate($request,[
         'status' => 'required|max:1000',
      ]);
      Auth::user()->statuses()->create([
       'body' =>$request->input('status'),

      ]);

        return redirect()
            ->route('home')
            ->with('info', 'status posted');
    }

    public function postReply(Request $request, $statusId)
    {

        $this->validate($request, [
            "reply-{$statusId }" => 'required|max:1000',


        ],[
            'required' => 'the reply body is required'
        ]);

        $status = Status::notReply()->find($statusId);
        if (!$status){
            return redirect()-> route('timeline.index');

        }

        if(!Auth::user()->isFriendsWith($status->user) && Auth::user()->id !== $status->user->id){
            return redirect()->route('timeline.index');
        }

        $reply = Status::create([
            'body' => $request -> input("reply-{$statusId}"),
            'user_id'=>auth()->user()->id,
        ])-> user()->associate(Auth::user());
        $status->replies()->save($reply);

        return redirect()->back();

    }

    public function getLike($statusid)
    {


        $status =Status::find($statusid);
        if (!$status) {

            return redirect()->back();

        }

        if(!Auth::user()->isFriendsWith($status->user)){
            return redirect()->back();
        }


        if(Auth::user()->hasLikedStatus($status)){

            return redirect()->back();
        }

        $like =$status->likes()->create([
            'user_id'=>auth()->id(),
        ]);
        return redirect()->back();
    }




}
