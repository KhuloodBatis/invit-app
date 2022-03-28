<?php

namespace App\Http\Requests;

use App\Models\InvitCode;
use App\Rules\InviteCodeApproved;
use App\Rules\InviteCodeNotExpired;
use App\Rules\InviteCodeHasQuantity;
use Illuminate\Foundation\Http\FormRequest;

class ActivaiteStoreRequest extends FormRequest
{
    //here defined the invitCode as protected
    public ?InvitCode $invitCode;



    public function authorize()
    {
        return true;
    }


    //this code create to preoareForValidation
    public function prepareForValidation(){
        //change $code to this->invitCode
        $this->invitCode = InvitCode::where('code',$this->code)->first();
      }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {                              //change request to this then up all in preoareForValidation()
        // $code = InvitCode::where('code',$this->code)->first();
        $this->invitCode = InvitCode::where('code',$this->code)->first();
        return [
            'code'=> [
                'required' ,
                'exists:invit_codes,code',
                'bail',
                                   //here change the $code to $this->invitCode
              new InviteCodeHasQuantity($this->invitCode),
              new InviteCodeNotExpired($this->invitCode),
              new InviteCodeApproved($this->invitCode)
               ]
            ];

    }
}
