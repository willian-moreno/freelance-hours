<x-layouts.app>
    <div class="grid grid-cols-3 gap-3">
        <div class="col-span-2">
            <livewire:projects.details :$project />
        </div>
        <div class="col-span-1">
            <livewire:projects.proposals :$project />
        </div>
    </div>
</x-layouts.app>
