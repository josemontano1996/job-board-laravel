<x-layout>
    <h1 class="my-16 text-center text-4xl font-medium text-slate-600">
        Sign in to your account
    </h1>
    <x-card class="px-16 py-8">
        <form action="{{ route("auth.store") }}" method="POST">
            @csrf

            <div class="mb-6">
                <label
                    for="email"
                    class="mb-2 block text-sm font-medium text-slate-900"
                >
                    Email
                </label>
                <x-text-input name="email" />
            </div>
            <div class="mb-6">
                <label
                    for="password"
                    class="mb-2 block text-sm font-medium text-slate-900"
                >
                    Password
                </label>
                <x-text-input type="password" name="password" />
            </div>

            <div class="mb-8 flex justify-between text-sm font-medium">
                <div class="flex items-center space-x-2">
                    <input
                        name="remember"
                        type="checkbox"
                        class="rounde-sm border border-slate-400"
                    />
                    <label for="remember">Remember me</label>
                </div>
                <div>
                    <a href="#" class="text-indigo-600 hover:underline">
                        Forgot password?
                    </a>
                </div>
            </div>

            <button class="btn w-full hover:bg-green-50">Log in</button>
        </form>
    </x-card>
</x-layout>
