<x-layout>
    @foreach ($jobs as $job)
        <x-card class="mb-4">
            <div class="mb-4 flex items-center justify-between">
                <h2 class="text-lg font-medium">{{ $job->title }}</h2>
                <div>Salary:</div>
            </div>
        </x-card>
    @endforeach
</x-layout>
