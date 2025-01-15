<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recipe extends Model
{
    protected $fillable = ['name', 'user_id', 'steps', 'image', 'category'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
