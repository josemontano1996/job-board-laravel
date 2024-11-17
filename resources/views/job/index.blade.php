<x-layout>
    @foreach ($jobs as $job)
        <x-card class="mb-4">
            <div class="mb-4 flex items-center justify-between">
                <h2 class="text-lg font-medium">{{ $job->title }}</h2>
                <div class="text-slate-500">
                    $ {{ number_format($job->salary) }}
                </div>
            </div>
            <div
                class="mb-4 flex items-center justify-between text-sm text-slate-500"
            >
                <div class="flex items-center space-x-4">
                    <p>Company name</p>
                    <p>{{ $job->location }}</p>
                </div>
                <div class="flex items-center space-x-2 text-xs">
                    <x-tag>{{ Str::ucfirst($job->experience) }}</x-tag>
                    <x-tag>
                        {{ Str::ucfirst($job->category) }}
                    </x-tag>
                </div>
            </div>
            {{-- Escaping the html for the description at the samke time as parsing the br --}}
            <p class="text-sm text-slate-500">
                {!! nl2br(e($job->description)) !!}
            </p>
        </x-card>
    @endforeach
</x-layout>
