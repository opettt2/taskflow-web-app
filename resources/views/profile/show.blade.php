<x-app-layout>
    <div class="max-w-2xl mx-auto space-y-8">

        {{-- Profile Info --}}
        <div class="p-6 rounded-2xl bg-white/50 dark:bg-gray-800/50 shadow border border-white/20 backdrop-blur-lg">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Profile Information</h2>

            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-300">Name</label>
                    <input name="name" value="{{ old('name', auth()->user()->name) }}" class="input-main">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-300">Email</label>
                    <input name="email" value="{{ old('email', auth()->user()->email) }}" class="input-main">
                </div>

                <button class="btn-primary w-full mt-3">Save</button>
            </form>
        </div>

        {{-- Password Change --}}
        <div class="p-6 rounded-2xl bg-white/50 dark:bg-gray-800/50 shadow border border-white/20 backdrop-blur-lg">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Update Password</h2>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm font-medium">Current Password</label>
                    <input type="password" name="current_password" class="input-main">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium">New Password</label>
                    <input type="password" name="password" class="input-main">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="input-main">
                </div>

                <button class="btn-primary w-full">Update Password</button>
            </form>
        </div>

    </div>
</x-app-layout>
