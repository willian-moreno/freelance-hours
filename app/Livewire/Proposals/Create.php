<?php

namespace App\Livewire\Proposals;

use App\Actions\ArrangePositions;
use App\Models\Project;
use App\Models\Proposal;
use Illuminate\Support\Facades\DB;
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

        DB::transaction(function () {
            $proposal = $this->project->proposals()->updateOrCreate([
                'email' => $this->email,
            ], [
                'hours' => $this->hours,
            ]);

            $this->arrangePositions($proposal);
        });

        $this->dispatch('proposal::created');

        $this->modal = false;
    }

    public function arrangePositions(Proposal $proposal)
    {
        $query = DB::select("
            select *, row_number() over (order by hours asc) as newPosition
            from proposals
            where project_id = :project
        ", ["project" => $proposal->project_id]);

        $position = collect($query)->where('id', '=', $proposal->id)->first();
        $otherProposal = collect($query)->where('position', '=', $position->newPosition)->first();

        if ($otherProposal) {
            $proposal->update(['position_status' => 'up']);
            Proposal::query()->where('id', '=', $otherProposal->id)->update(['position_status' => 'down']);
        }

        ArrangePositions::run($proposal->project_id);
    }

    public function render()
    {
        return view('livewire.proposals.create');
    }
}
