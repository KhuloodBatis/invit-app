<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvitCodeIndexController extends Controller
{
    Public function __invoke(Request $request)
    {
     // dd('invite');
     return view('invite.index'  ,[
         'invitCodes' =>$request->user()->invitCodes,
     ]);
    }
}
