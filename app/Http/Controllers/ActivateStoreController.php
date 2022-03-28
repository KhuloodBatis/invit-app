<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivaiteStoreRequest;
use App\Rules\InviteCodeHasQuantity;
use App\Models\InvitCode;
use App\Rules\InviteCodeNotExpired;
use Illuminate\Http\Request;

class ActivateStoreController extends Controller
{
    public function __construct()
    {
      $this->middleware(['auth']);
    }
                   //change Request To the custom request
    public function __invoke(ActivaiteStoreRequest $request){

        $request->user()->activate();
        //to increment quantity
        $request->invitCode->increment('quantity_used');

        return redirect()->route('dashboard');
    }
}
