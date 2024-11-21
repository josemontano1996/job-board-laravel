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
            enctype="multipart/form-data"
        >
            @csrf
            <div class="mb-4">
                <x-label :required="true" for="expected_salary">
                    Expected salary
                </x-label>
                <x-text-input type="number" name="expected_salary" />
            </div>
            <div class="mb-4">
                <x-label for="cv" :required="true">Upload CV</x-label>

                <x-text-input type="file" fileType=".pdf" name="cv" />
            </div>
            <button class="btn w-full">Apply</button>
        </form>
    </x-card>
</x-layout>
