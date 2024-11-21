<x-layout>
    <x-card>
        <form action="{{ route("employer.store") }}" method="POST">
            @csrf
            <div class="mb-4">
                <x-label for="company_name" :required="true">
                    Company name
                </x-label>
                <x-text-input name="company_name" />
            </div>
            <button class="btn w-full">Create</button>
        </form>
    </x-card>
</x-layout>
