<?php

namespace App\Http\Controllers;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class
FriendsController extends Controller
{
    public  function getIndex(){
        $friends = Auth::user()->friends();
        $requests =Auth::user()->friendRequests();
        return view ('friends.index')->with([
            'friends' => $friends,
            'requests'=> $requests,
        ]);

    }

}
