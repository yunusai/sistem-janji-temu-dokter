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
                                {{ __('Edit Data Jadwal Periksa') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Silakan perbarui informasi jadwal periksa sesuai dengan hari, jam mulai, dan jam selesai terbaru.') }}
                            </p>

                        </header>

                        <form class="mt-6" action="{{ route('dokter.jadwal-periksa.change', $jadwalPeriksa->id) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="mb-3 form-group">
                                <label for="editHari">Hari</label>
                                <select class="rounded form-control" id="editHari" name="hari" value="{{ $jadwalPeriksa->hari }}" required>
                                    <option>Pilih Hari</option>
                                    <option>Senin</option>
                                    <option>Selasa</option>
                                    <option>Rabu</option>
                                    <option>Kamis</option>
                                    <option>Jumat</option>
                                    <option>Sabtu</option>
                                    <option>Minggu</option>
                                </select>
                            </div>

                            <div class="mb-3 form-group">
                                <label for="editJamMulai">Jam Mulai</label>
                                <input type="time" class="rounded form-control" id="editJamMulai"
                                    value="{{ $jadwalPeriksa->jam_mulai }}" name="jam_mulai"  required>
                            </div>

                            <div class="mb-3 form-group">
                                <label for="editJamSelesai">Jam Selesai</label>
                                <input type="time" class="rounded form-control" id="editJamSelesai"
                                    value="{{ $jadwalPeriksa->jam_selesai }}" name="jam_selesai" required>
                            </div>

                            <a type="button" href="{{ route('dokter.jadwal-periksa.index') }}" class="btn btn-secondary">
                                Batal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>