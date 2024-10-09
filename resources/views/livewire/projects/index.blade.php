<div>
    componente livewire projects.index

    @foreach ($this->projects as $project)
        <li>
            <a href={{ route('projects.details', $project->uuid) }}>
                {{ $project->id }}. {{ $project->title }}
            </a>
        </li>
    @endforeach
</div>
