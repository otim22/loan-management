<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = ["name", "amount", "status", "account_number_id"];

    public function account_number(): BelongsTo
    {
        return $this->belongsTo(AccountNumber::class);
    }
}
