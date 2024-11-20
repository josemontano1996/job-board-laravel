<x-layout>
    <x-breadcrumps :links="['Jobs' => route('jobs.index')]" class="mb-4" />
    <x-card class="mb-4 text-sm">
        <form
            id="filtering-form"
            action="{{ route("jobs.index") }}"
            method="GET"
        >
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-semibold">Search</div>
                    <x-text-input
                        name="search"
                        value="{{request('search')}}"
                        placeholder="Search for any text"
                        form-id="filtering-form"
                    />
                </div>
                <div>
                    <div class="mb-1 font-semibold">Salary</div>
                    <div class="flex space-x-2">
                        <x-text-input
                            name="min_salary"
                            value="{{request('min_salary')}}"
                            placeholder="Min. $"
                            form-id="filtering-form"
                        />
                        <x-text-input
                            name="max_salary"
                            value="{{request('max_salary')}}"
                            placeholder="Max. $"
                            form-id="filtering-form"
                        />
                    </div>
                </div>

                <div>
                    <div class="mb-1 font-semibold">Experience</div>
                    <x-radio-group
                        name="experience"
                        :options="\App\Models\JobOffer::$experience"
                    />
                </div>
                <div>
                    <div class="mb-1 font-semibold">Category</div>
                    <x-radio-group
                        name="category"
                        :options="\App\Models\JobOffer::$category"
                    />
                </div>
            </div>
            <button class="btn w-full hover:border-blue-200">Filter</button>
        </form>
    </x-card>
    @foreach ($jobs as $job)
        <x-job-card class="mb-4" :$job>
            <div>
                <x-link-button :href="route('jobs.show', $job)">
                    Show
                </x-link-button>
            </div>
        </x-job-card>
    @endforeach
</x-layout>
