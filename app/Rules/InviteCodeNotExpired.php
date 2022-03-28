<?php

namespace App\Rules;

use App\Models\InvitCode;
use Illuminate\Contracts\Validation\Rule;

class InviteCodeNotExpired implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(protected ?InvitCode $invitCode)
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
       // return false;
       return !$this->invitCode?->hasExpired();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The invite code has expired.';
    }
}
