<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Component;

class Timer extends Component
{
    public Project $project;

    public function render()
    {
        $diff = now()->diff($this->project->ends_at);

        return view('livewire.projects.timer', [
            'days' => str_pad($diff->d, 2, '0', STR_PAD_LEFT),
            'hours' => str_pad($diff->h, 2, '0', STR_PAD_LEFT),
            'minutes' => str_pad($diff->i, 2, '0', STR_PAD_LEFT),
            'seconds' => str_pad($diff->s, 2, '0', STR_PAD_LEFT),
        ]);
    }
}
