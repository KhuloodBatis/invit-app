<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class InvitCodeStoreController extends Controller
{
    public function __invoke(Request $request)
    {
       //dd('');
         if($request->user()->reachedInviteCodeRequestLimit()){

            return back();
         }
       $request->user()->invitCodes()->create([
                'code' =>Str::random(8)
       ]);

       return back();


    }
}
