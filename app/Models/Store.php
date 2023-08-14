<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id'
    ];

    /**
     * The user owns the store
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
