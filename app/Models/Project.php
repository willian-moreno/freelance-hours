<?php

namespace App\Models;

use App\{
    Traits\Uuid,
    ProjectStatus
};
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
            'tech_stack' => 'array',
            'status' => ProjectStatus::class,
            'ends_at' => 'datetime'
        ];
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }
}
