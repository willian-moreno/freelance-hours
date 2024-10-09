<?php

namespace App\Livewire\Proposals;

use App\Models\Project;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Create extends Component
{
    public Project $project;

    public bool $modal = false;

    #[Rule(rule: ['required', 'email'], as: 'E-mail')]
    public string $email = '';

    #[Rule(rule: ['required', 'numeric', 'gt:0'], as: 'Horas')]
    public int $hours = 0;

    #[Rule(
        rule: ['required', 'accepted'],
        message: ['accepted' => 'Você precisa concordar com os termos de uso.']
    )]
    public bool $termsOfUseAccepted = false;

    public function save()
    {
        $this->validate();

        $this->project->proposals()->updateOrCreate([
            'email' => $this->email,
        ], [
            'hours' => $this->hours,
        ]);

        $this->modal = false;
    }

    public function render()
    {
        return view('livewire.proposals.create');
    }
}
