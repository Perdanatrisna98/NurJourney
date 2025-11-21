<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Bukti Pembayaran
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded p-6">

                <form action="{{ route('staff.bukti-pembayaran.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="jamaah_id" class="block mb-1 font-medium">Nama Jamaah</label>
                        <select name="jamaah_id" id="jamaah_id" class="w-full border p-2 rounded">
                            @foreach($jamaah as $j)
                                <option value="{{ $j->id }}">{{ $j->nama }}</option>
                            @endforeach
                        </select>
                        @error('jamaah_id') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="file" class="block mb-1 font-medium">Upload Bukti</label>
                        <input type="file" name="file" id="file" class="w-full border p-2 rounded">
                        @error('file') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
                    <a href="{{ route('staff.bukti-pembayaran.index') }}" class="ml-2 text-gray-600">Kembali</a>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
