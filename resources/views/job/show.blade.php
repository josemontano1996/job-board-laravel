<x-layout>
    <x-breadcrumps
        class="mb-4"
        :links="['Jobs'=> route('jobs.index'), $job->title=>'#']"
    />
    <x-job-card :$job>
        {{-- Escaping the html for the description at the samke time as parsing the br --}}
        <p class="mb-4 text-sm text-slate-500">
            {!! nl2br(e($job->description)) !!}
        </p>
    </x-job-card>
</x-layout>
