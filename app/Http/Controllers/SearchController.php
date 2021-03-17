<?php

namespace App\Http\Controllers;
use App\Models\Users;
use DB;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public  function getResult(Request $request){
        $query = $request->input('query');
        if(!$query){
          return  redirect()->route('home');
        }

        $users = users::where(DB::raw("CONCAT(first_name, '', last_name)"),
            'LIKE', "%{$query}%")
            ->orWhere('username', 'LIKE' ,  "%{$query}%" )
            ->get();

        return view('search.result')->with([
            'users' => $users,
        ]);
    }
}
