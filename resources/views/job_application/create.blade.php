<x-layout>
    <x-breadcrumps
        :links="['Jobs'=>route('jobs.index'), $job->title=>route('jobs.show', $job), 'Apply'=>'#']"
        class="mb-4"
    />
    <x-job-card :$job />
    <x-card>
        <h4 class="mb-4 text-lg font-medium">Your Job Application</h4>
        <form
            action="{{ route("job.application.store", $job) }}"
            method="POST"
        >
            @csrf
            <div class="mb-4">
                <label
                    for="expected_salary"
                    class="mb-2 block text-sm font-medium text-slate-900"
                >
                    Expected salary
                </label>
                <x-text-input type="number" name="expected_salary" />
            </div>
            <button class="btn w-full">Apply</button>
        </form>
    </x-card>
</x-layout>
