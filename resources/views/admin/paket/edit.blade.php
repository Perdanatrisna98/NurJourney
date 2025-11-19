<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Paket</h2>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shaddow rounded-lg p-6">
           <form method="POST" action="{{ route('admin.paket.update', $paket->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Nama Paket</label>
            <input type="text" name="nama_paket" value="{{ $paket->nama_paket }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
        </div>
    
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="deskripsi" class="w-full border-gray-300 rounded-md shadow-sm">{{ $paket->deskripsi }}</textarea>
        </div>
    
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Harga</label>
            <input type="number" name="harga" value="{{ $paket->harga }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
        </div>
    
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Kategori</label>
            <select name="kategori" class="w-full border-gray-300 rounded-md shadow-sm">
                <option value="haji" {{ $paket->kategori == 'haji' ? 'selected' : '' }}>Haji</option>
                <option value="umroh" {{ $paket->kategori == 'umroh' ? 'selected' : '' }}>Umroh</option>
                <option value="wisata" {{ $paket->kategori == 'wisatahalal' ? 'selected' : '' }}>Wisata Halal</option>
            </select>
        </div>
    
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Gambar Baru (optional)</label>
            <input type="file" name="gambar" class="w-full border-gray-300 rounded-md shadow-sm" accept="image/*">
        </div>
    
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Gambar Saat Ini:</label><br>
            <img src="{{ asset($paket->gambar) }}" alt="{{ $paket->nama_paket }}" width="120" class="mt-2 rounded">
        </div>
    
        <button class="bg-blue-600 text-black px-4 py-2 rounded">Update</button>
    </form>
    
        </div>
    </div>
</x-app-layout>
