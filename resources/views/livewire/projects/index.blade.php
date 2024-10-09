<div class="grid grid-cols-2 gap-2">
    @foreach ($this->projects as $project)
        <a href={{ route('projects.details', $project->uuid) }}>
            <x-projects.simple-card :$project />
        </a>
    @endforeach
</div>
