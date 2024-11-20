<x-card class="mb-4">
    <div class="mb-4 flex items-center justify-between">
        <h2 class="text-lg font-medium">{{ $job->title }}</h2>
        <div class="text-slate-500">$ {{ number_format($job->salary) }}</div>
    </div>
    <div class="mb-4 flex items-center justify-between text-sm text-slate-500">
        <div class="flex items-center space-x-4">
            <p>Company name</p>
            <p>{{ $job->location }}</p>
        </div>
        <div class="flex items-center space-x-2 text-xs">
            <x-tag>
                <a
                    href="{{ route("jobs.index", ["experience" => "$job->experience"]) }}"
                >
                    {{ Str::ucfirst($job->experience) }}
                </a>
            </x-tag>
            <x-tag>
                <a
                    href="{{ route("jobs.index", ["category" => "$job->category"]) }}"
                >
                    {{ Str::ucfirst($job->category) }}
                </a>
            </x-tag>
        </div>
    </div>

    {{ $slot }}
</x-card>
