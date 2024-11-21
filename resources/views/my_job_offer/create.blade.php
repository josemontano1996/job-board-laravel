<x-layout>
    <x-breadcrumps
        :links="['My Job Offers'=>route('my-job-offers.index'), 'Create'=>'#']"
        class="mb-4"
    />
    <x-card class="mb-4">
        <form action="{{route('my-job-offers.store')}}" method="POST">
            @csrf
            <h1 class="mb-6 text-center text-2xl font-medium">
                Job Offer Form
            </h1>
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <x-label for="title" :required="true">Title</x-label>
                    <x-text-input name="title" />
                </div>
                <div>
                    <x-label for="location" :required="true">Location</x-label>
                    <x-text-input name="location" />
                </div>
                <div class="col-span-2">
                    <x-label for="salary" :required="true">Salary</x-label>
                    <x-text-input name="salary" type="number" />
                </div>
                <div class="col-span-2">
                    <x-label for="description" :required="true">
                        Description
                    </x-label>
                    <x-text-input name="description" type="textarea" />
                </div>
                <div>
                    <x-label for="category" :required="true">Category</x-label>
                    <x-radio-group
                        name="category"
                        :allOption="false"
                        :value="old('category')"
                        :options="\App\Models\JobOffer::$category"
                    />
                </div>
                <div>
                    <x-label for="experience" :required="true">
                        Experience
                    </x-label>
                    <x-radio-group
                        name="experience"
                        :allOption="false"
                        :value="old('experience')"
                        :options="\App\Models\JobOffer::$experience"
                    />
                </div>
            </div>
            <button class="btn w-full">Create Job</button>
        </form>
    </x-card>
</x-layout>
