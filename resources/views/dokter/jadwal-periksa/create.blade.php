<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Jadwal Periksa') }}
        </h2>
    </x-slot>

    @if ($errors->has('error'))
    <div
        x-data="{ show: true }"
        x-show="show"
        x-init="setTimeout(() => show = false, 500)"
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
        class="fixed inset-0 flex items-center justify-center z-50"
        style="pointer-events: none;"
    >
        <div class="bg-red-500 bg-opacity-50 text-white px-6 py-4 rounded shadow-lg text-lg font-semibold text-center" style="pointer-events: auto;">
            {{ $errors->first('error') }}
        </div>
    </div>
    @endif

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow-sm sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Tambah Data Jadwal Periksa') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Silakan isi form di bawah ini untuk menambahkan data jadwal periksa ke dalam sistem.') }}
                            </p>
                        </header>

                        <form class="mt-6" id="formJadwal" action="{{ route('dokter.jadwal-periksa.store') }}" method="POST">
                            @csrf

                            {{-- Select Hari--}}
                            <div class="mb-3 form-group">
                                <label for="selectHari">Hari</label>
                                <select class="rounded form-control" id="selectHari" name="hari" required>
                                    <option value="">Pilih Hari</option>
                                    <option>Senin</option>
                                    <option>Selasa</option>
                                    <option>Rabu</option>
                                    <option>Kamis</option>
                                    <option>Jumat</option>
                                    <option>Sabtu</option>
                                    <option>Minggu</option>
                                </select>
                            </div>

                            {{-- Jam Mulai --}}
                            <div class="mb-3 form-group">
                                <label for="jamMulai">Jam Mulai</label>
                                <input
                                    type="time"
                                    class="rounded form-control"
                                    id="jamMulai"
                                    name="jam_mulai"
                                    required
                                >
                            </div>

                            {{-- Jam Selesai --}}
                            <div class="mb-3 form-group">
                                <label for="jamSelesai">Jam Selesai</label>
                                <input
                                    type="time"
                                    class="rounded form-control"
                                    id="jamSelesai"
                                    name="jam_selesai"
                                    required
                                >
                            </div>

                            {{-- Tombol Aksi --}}
                            <div class="flex items-center gap-4 mt-4">
                                <a href="{{ route('dokter.jadwal-periksa.index') }}" class="btn btn-secondary">
                                    Batal
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
