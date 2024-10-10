<?php

namespace App\Models;

use App\Traits\Uuid;

use Illuminate\Database\Eloquent\{
    Factories\HasFactory,
    Model
};
use Illuminate\Notifications\Notifiable;

class Proposal extends Model
{
    /** @use HasFactory<\Database\Factories\ProposalFactory> */
    use HasFactory, Notifiable, Uuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'hours',
        'position_status',
    ];
}
