<?php

namespace App\Models;

use App\Traits\Uuid;

use Illuminate\Database\Eloquent\{
    Factories\HasFactory,
    Model
};

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory, Uuid;

    protected function casts()
    {
        return [
            'tech_stack' => 'array'
        ];
    }
}
