<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Paket</h2>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg p-6">
            <form action="{{ route('admin.paket.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
    
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Nama Paket</label>
                    <input type="text" name="nama_paket" class="w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
    
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="deskripsi" class="w-full border-gray-300 rounded-md shadow-sm"></textarea>
                </div>
    
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Harga</label>
                    <input type="number" name="harga" class="w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
    
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Kategori</label>
                    <select name="kategori" class="w-full border-gray-300 rounded-md shadow-sm">
                        <option value="haji">Haji</option>
                        <option value="umroh">Umroh</option>
                        <option value="wisata">Wisata Halal</option>
                    </select>
                </div>
    
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Gambar Paket</label>
                    <input type="file" name="gambar" class="w-full border p-2 rounded" accept="image/*">
                </div>
    
                <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
            </form>
        </div>
    </div>
</x-app-layout>
