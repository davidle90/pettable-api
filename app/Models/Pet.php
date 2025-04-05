<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pet extends Model
{
    /** @use HasFactory<\Database\Factories\PetFactory> */
    use HasFactory;

    protected $fillable = [
        'reference_id',
        'user_id',
        'name',
        'hunger',
        'happiness',
        'energy',
        'is_alive'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'last_updated' => 'datetime'
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
