<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Memeriksa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow-sm sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Periksa Pasien') }}
                            </h2>
                        </header>

                        <form class="mt-6" id="formPeriksa" action="{{ route('dokter.memeriksa.store') }}" method="POST">
                            @csrf

                            {{-- Nama Pasien --}}
                            <div class="mb-3 form-group">
                                <label for="namaPasien">Nama Pasien</label>
                                <input
                                    type="text"
                                    class="rounded form-control"
                                    id="namaPasien"
                                    name="nama_pasien"
                                    value="{{ $janjiPeriksa->pasien->nama }}"
                                >
                            </div>

                            {{-- Tanggal Periksa --}}
                            <div class="mb-3 form-group">
                                <label for="tanggalPeriksa">Tanggal Periksa</label>
                                <input
                                    type="datetime-local"
                                    class="rounded form-control"
                                    id="tanggalPeriksa"
                                    name="tanggal_periksa"
                                    value="{{ old('tanggal_periksa') }}"
                                >
                            </div>

                            {{-- Catatan --}}
                            <div class="mb-3 form-group">
                                <label for="catatan">Catatan</label>
                                <input
                                    type="text"
                                    class="rounded form-control"
                                    id="catatan"
                                    name="catatan"
                                    value="{{ old('catatan') }}"
                                >
                            </div>

                            {{-- Obat --}}
                            <div class="mb-3 form-group">
                                <label for="obat">Obat</label>
                                <select class="rounded form-control" id="obat" name="obat[]" multiple>
                                    @foreach ($obats as $obat)
                                        <option value="{{ $obat->id }}" data-harga="{{ $obat->harga }}">
                                            {{ $obat->nama_obat }} - {{ $obat->kemasan }} (Rp. {{ number_format($obat->harga, 0, ',', '.') }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Biaya Periksa --}}
                            <div class="mb-3 form-group">
                                <label name="biaya_periksa" for="biayaPeriksa">Biaya Periksa</label>
                                <input
                                    type="number"
                                    class="rounded form-control"
                                    id="biayaPeriksa"
                                    name="biaya_periksa"
                                    value="150000"
                                    readonly
                                >
                            </div>

                            {{-- id janji periksa --}}
                            <input type="hidden" name="id_janji_periksa" value="{{ $janjiPeriksa->id }}">

                            {{-- Tombol Aksi --}}
                            <div class="flex items-center gap-4 mt-4">
                                <a href="{{ route('dokter.memeriksa.index') }}" class="btn btn-secondary">
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

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Inisialisasi Select2
        $('#obat').select2({
            placeholder: "Pilih Obat",
            width: '100%'
        });

        const biayaPeriksa = document.getElementById('biayaPeriksa');
        const biayaDasar = 150000;

        function updateTotal() {
            let total = biayaDasar;
            $('#obat').find(':selected').each(function() {
                total += parseInt($(this).data('harga')) || 0;
            });
            biayaPeriksa.value = total;
        }

        $('#obat').on('change', updateTotal);
        updateTotal(); // initial call
    });
    </script>
</x-app-layout>
