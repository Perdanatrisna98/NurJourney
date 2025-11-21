<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Data Jamaah
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">

            @if (session('success'))
                <div class="bg-green-200 text-green-800 p-3 rounded mb-3">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('staff.jamaah.update', $jamaah->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="font-semibold">Nama Lengkap</label>
                    <input type="text" name="nama" class="w-full border p-2 rounded"
                           value="{{ old('nama', $jamaah->nama) }}" required>
                </div>

                <div class="mb-3">
                    <label class="font-semibold">NIK</label>
                    <input type="text" name="nik" class="w-full border p-2 rounded"
                           value="{{ old('nik', $jamaah->nik) }}" required>
                </div>

                <div class="mb-3">
                    <label class="font-semibold">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="w-full border p-2 rounded" required>
                        <option value="L" {{ old('jenis_kelamin', $jamaah->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="P" {{ old('jenis_kelamin', $jamaah->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="font-semibold">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="w-full border p-2 rounded"
                           value="{{ old('tempat_lahir', $jamaah->tempat_lahir) }}" required>
                </div>

                <div class="mb-3">
                    <label class="font-semibold">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="w-full border p-2 rounded"
                           value="{{ old('tanggal_lahir', $jamaah->tanggal_lahir) }}" required>
                </div>

                <div class="mb-3">
                    <label class="font-semibold">Alamat</label>
                    <textarea name="alamat" class="w-full border p-2 rounded" required>{{ old('alamat', $jamaah->alamat) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="font-semibold">Nomor WA</label>
                    <input type="text" name="wa" class="w-full border p-2 rounded"
                           value="{{ old('wa', $jamaah->wa) }}" required>
                </div>

                <div class="mb-3">
                    <label class="font-semibold">Kelompok</label>
                    <input type="text" name="kelompok" class="w-full border p-2 rounded"
                           value="{{ old('kelompok', $jamaah->kelompok) }}">
                </div>

                <button class="bg-blue-600 text-white px-4 py-2 rounded">
                    Update Data
                </button>

            </form>
        </div>
    </div>
</x-app-layout>
