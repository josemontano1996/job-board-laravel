<x-layout>
    <x-breadcrumps class="mb-4" :links="['My Job Applications'=>'#']" />

    @forelse ($applications as $application)
        <x-job-card :job="$application->jobOffer">
            <div
                class="flex items-center justify-between text-sm text-slate-500"
            >
                <div class="flex flex-col space-y-2">
                    <div>
                        <p>
                            Applied
                            {{ $application->created_at->diffForHumans() }}
                        </p>
                        <p>
                            Your asking salary:
                            ${{ number_format($application->expected_salary) }}
                        </p>
                    </div>
                    <div>
                        <p>
                            Other
                            {{ $application->jobOffer->job_applications_count - 1 }}
                            {{ Str::plural("applicant", $application->jobOffer->job_applications_count - 1) }}
                        </p>
                        <p>
                            Average asking salary:
                            ${{ number_format($application->jobOffer->job_applications_avg_expected_salary) }}
                        </p>
                    </div>
                </div>
                <div>
                    <form
                        action="{{ route("my-job-applications.destroy", $application) }}"
                        method="POST"
                    >
                        @csrf
                        @method("DELETE")
                        <button class="btn">Cancel</button>
                    </form>
                </div>
            </div>
        </x-job-card>
    @empty
        <div class="rounded-md border border-dashed border-slate-300 p-8">
            <p class="text-center font-medium" role="alert">
                No job application yet
            </p>
            <p class="text-center">
                Go find some jobs
                <a
                    href="{{ route("jobs.index") }}"
                    class="text-indigo-500 font-medium hover:underline"
                >
                    here!
                </a>
            </p>
        </div>
    @endforelse
</x-layout>
