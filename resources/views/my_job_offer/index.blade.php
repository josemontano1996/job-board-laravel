<x-layout>
    <x-breadcrumps :links="['My Job Offers'=>'#']" class="mb-4" />
    <div class="mb-8 text-right">
        <x-link-button href="{{route('my-job-offers.create')}}">
            Add new
        </x-link-button>
    </div>

    @forelse ($jobOffers as $jobOffer)
        <x-job-card :job="$jobOffer">
            <div class="text-xs text-slate-500">
                @forelse ($jobOffer->jobApplications as $application)
                    <div class="mb-4 flex items-center justify-between">
                        <div>
                            <p>{{ $application->user->name }}</p>
                            <p>
                                Applied
                                {{ $application->created_at->diffForHumans() }}
                            </p>
                            <p>Download CV</p>
                        </div>
                        <div>
                            $
                            {{ number_format($application->expected_salary) }}
                        </div>
                    </div>
                @empty
                    <div class="text-center font-medium">No applicantions yet.</div>
                @endforelse
                <div class="flex space-x-2">
                    <x-link-button href="{{route('my-job-offers.edit', $job)}}">Edit</x-link-button>
                </div>
            </div>
        </x-job-card>
    @empty
        <div class="rounded-md border border-dashed border-slate-300 p-8">
            <div class="text-center font-medium">No jobs yet.</div>
            <div class="text-center">
                <a
                    href="{{ route("my-job-offers.create") }}"
                    class="text-indigo-500 hover:underline"
                >
                    Post your first job!
                </a>
            </div>
        </div>
    @endforelse
</x-layout>
