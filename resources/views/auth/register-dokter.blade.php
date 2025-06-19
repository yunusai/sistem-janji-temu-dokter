<x-guest-layout>
    <form method="POST" action="{{ route('register-dokter.store') }}">
        @csrf

        <!-- Nama -->
        <div>
            <x-input-label for="nama" :value="__('Nama Lengkap')" />
            <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
        </div>

        <!-- Alamat -->
        <div class="mt-4">
            <x-input-label for="alamat" :value="__('Alamat')" />
            <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
        </div>

        <!-- No KTP -->
        <div class="mt-4">
            <x-input-label for="no_ktp" :value="__('Nomor Induk Kependudukan')" />
            <x-text-input id="no_ktp" class="block mt-1 w-full" type="text" name="no_ktp" :value="old('no_ktp')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('no_ktp')" class="mt-2" />
        </div>

        <!-- No Hp -->
        <div class="mt-4">
            <x-input-label for="no_hp" :value="__('Nomor Telepon')" />
            <x-text-input id="no_hp" class="block mt-1 w-full" type="text" name="no_hp" :value="old('no_hp')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
        </div>

        <!-- Poli -->
        <div class="mt-4">
            <x-input-label for="id_poli" :value="__('Poli')" />
            <select id="id_poli" name="id_poli" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="">Pilih Poli</option>
                @foreach ($polis as $poli)
                    <option value="{{ $poli->id }}" {{ old('id_poli') == $poli->id ? 'selected' : '' }}>{{ $poli->nama }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('id_poli')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- role -->
        {{-- <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />
            <select id="role" name="role" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="pasien">Pasien</option>
                <option value="dokter">Dokter</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div> --}}

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Sudah terdaftar?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Daftar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
