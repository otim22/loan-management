<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AccountNumber extends Model
{
    protected $fillable = ["account_numbers", "user_id", "status"];

    protected $hidden = [];

    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class);
    }
}
