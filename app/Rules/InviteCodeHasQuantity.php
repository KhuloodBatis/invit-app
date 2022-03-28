<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\InvitCode;

class InviteCodeHasQuantity implements Rule
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
        return $this->invitCode?->hasAvailableQuantity();

        //return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'the code has reached the maxmum usage';
    }
}
