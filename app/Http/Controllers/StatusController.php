<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Auth;
class StatusController extends Controller
{
    public function postStatus(Request $request){
      $this->validate($request,[
         'status' => 'required|max:30',
      ]);
    }
}
