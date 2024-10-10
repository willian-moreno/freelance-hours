<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class Proposals extends Component
{
    public Project $project;

    public int $visibleQuantity = 5;

    #[Computed()]
    public function proposals()
    {
        return $this->project->proposals()
            ->orderBy('hours')
            ->paginate($this->visibleQuantity);
    }

    #[Computed()]
    public function publishedAt()
    {
        return $this->project->proposals()
            ->latest()
            ->first()
            ->created_at
            ->diffForHumans();
    }

    public function loadMore()
    {
        $this->visibleQuantity += 5;
    }

    #[On('proposal::created')]
    public function render()
    {
        return view('livewire.projects.proposals');
    }
}
