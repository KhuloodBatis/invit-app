<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvitCode extends Model
{
    use HasFactory;

    protected $fillable = ['code'];

    protected $attribute =[
        'quantity' => 5,
        'quantity_used' => 0
    ];

    protected $casts = [
        'expires_at' => 'dateTime',
        'approved_at' => 'dateTime',
    ];

    public function hasAvailableQuantity()
    {
        return $this->quantity_used < $this->quantity;
    }

    public function approved(){

        return !is_null($this->approved_at);
    }

    public function hasExpired(){

        return $this->expires_at?->lt(now());
    }
}
