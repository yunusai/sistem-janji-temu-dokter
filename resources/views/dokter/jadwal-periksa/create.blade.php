<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Jadwal Periksa') }}
        </h2>
    </x-slot>

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
                                    {{-- <option value="senin" {{ old('hari') == 'senin' ? 'selected' : '' }}>Senin</option>
                                    <option value="selasa" {{ old('hari') == 'selasa' ? 'selected' : '' }}>Selasa</option>
                                    <option value="rabu" {{ old('hari') == 'rabu' ? 'selected' : '' }}>Rabu</option>
                                    <option value="kamis" {{ old('hari') == 'kamis' ? 'selected' : '' }}>Kamis</option>
                                    <option value="jumat" {{ old('hari') == 'jumat' ? 'selected' : '' }}>Jumat</option>
                                    <option value="sabtu" {{ old('hari') == 'sabtu' ? 'selected' : '' }}>Sabtu</option>
                                    <option value="minggu" {{ old('hari') == 'minggu' ? 'selected' : '' }}>Minggu</option> --}}
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
                                <a href="{{ route('dokter.obat.index') }}" class="btn btn-secondary">
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
