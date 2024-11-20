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

        @can("apply", $job)
            <x-link-button :href="route('job.application.create', $job)">
                Apply now
            </x-link-button>
        @else
            <div class="text-center text-sm font-medium text-slate-500">
                You have already applied.
            </div>
        @endcan
    </x-job-card>
    <x-card class="mb-4">
        <h3 class="mb-4 text-lg font-medium">
            More from {{ $job->employer->company_name }}
        </h3>
        <div class="text-sm text-slate-500">
            @foreach ($job->employer->jobOffers as $otherJob)
                <div class="mb-4 flex justify-between">
                    <div class="">
                        <div class="text-slate-700">
                            <a href="{{ route("jobs.show", $otherJob) }}">
                                {{ $otherJob->title }}
                            </a>
                        </div>
                        <div class="text-xs">
                            {{ $otherJob->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div class="text-xs">
                        $ {{ number_format($otherJob->salary) }}
                    </div>
                </div>
            @endforeach
        </div>
    </x-card>
</x-layout>
