<?php

namespace App\Livewire\Projects;

use App\Models\Project;

use Livewire\{
    Attributes\Computed,
    Component
};

class Index extends Component
{
    #[Computed()]
    public function projects()
    {
        return Project::query()->get();
    }

    public function render()
    {
        return view('livewire.projects.index');
    }
}
