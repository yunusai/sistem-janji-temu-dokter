<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Poli Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's poli information.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update_poli') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="poli" :value="__('Poli')" />
            <select id="id_poli" name="id_poli" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 dark:focus:border-indigo-500 dark:focus:ring-offset-gray-800">
                <option value="">Belum Punya Poli</option>
                @foreach ($polis as $poli)
                    <option value="{{ $poli->id }}" {{ old('id_poli', $user->id_poli) == $poli->id ? 'selected' : '' }}>{{ $poli->nama }}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('poli')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
