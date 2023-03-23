<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $casts = [
        'complete' => 'boolean',
    ];

    protected $fillable = [
        'periode',
        'first',
        'second',
        'third',
        'starter',
        'consolation',
        'complete',
        'created_at',
        'updated_at',
    ];

    /**
     * Interact with the user's first name.
     *
     * @return Attribute
     */
    protected function resultTime(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => strtolower($value),
        );
    }
}