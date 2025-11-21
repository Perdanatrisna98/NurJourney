<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pendataan Jamaah
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">

            @if (session('success'))
                <div class="bg-green-200 text-green-800 p-3 rounded mb-3">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('staff.jamaah.store') }}" method="POST"> 
                @if($konsultasi)
                    <input type="hidden" name="konsultasi_id" value="{{ $konsultasi->id }}">
                @endif
                @csrf

                <div class="mb-3">
                    <label class="font-semibold">Nama Lengkap</label>
                    <input type="text" name="nama" class="w-full border p-2 rounded" value="{{ $konsultasi->nama ?? '' }}" required>
                </div>

                <div class="mb-3">
                    <label class="font-semibold">NIK</label>
                    <input type="text" name="nik" class="w-full border p-2 rounded" required>
                </div>

                <div class="mb-3">
                    <label class="font-semibold">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="w-full border p-2 rounded" required>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="font-semibold">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="w-full border p-2 rounded" required>
                </div>

                <div class="mb-3">
                    <label class="font-semibold">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="w-full border p-2 rounded" required>
                </div>

                <div class="mb-3">
                    <label class="font-semibold">Alamat</label>
                    <textarea name="alamat" class="w-full border p-2 rounded" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="font-semibold">Nomor WA</label>
                    <input type="text" name="wa" class="w-full border p-2 rounded" value="{{ $konsultasi->wa ?? '' }}" required>
                </div>

                <div class="mb-3">
                    <label class="font-semibold">Kelompok</label>
                    <input type="text" name="kelompok" class="w-full border p-2 rounded">
                </div>

                <button class="bg-blue-600 text-white px-4 py-2 rounded">
                    Simpan Data
                </button>

            </form>
        </div>
    </div>

</x-app-layout>
