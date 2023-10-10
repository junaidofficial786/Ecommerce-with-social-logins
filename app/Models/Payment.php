<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Order;
use App\Models\User;

class Payment extends Model
{
    use HasFactory;

    
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
