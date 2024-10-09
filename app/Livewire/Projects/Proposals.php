<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Proposals extends Component
{
    public Project $project;

    public int $visibleQuantity = 10;

    #[Computed()]
    public function proposals()
    {
        return $this->project->proposals()
            ->orderByDesc('hours')
            ->simplePaginate($this->visibleQuantity);
    }

    public function loadMore()
    {
        $this->visibleQuantity += 10;
    }

    public function render()
    {
        return view('livewire.projects.proposals');
    }
}
