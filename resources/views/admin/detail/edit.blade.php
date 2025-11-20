<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Edit Detail Paket</h2>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
            <form action="{{ route('admin.detail.update',$detail->id) }}" method="POST">
                @csrf
                @method('PUT')
    
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Paket</label>
                    <input type="text" value="{{ $detail->paket->nama_paket }}" class="w-full border-gray-300 rounded-md shadow-sm bg-gray-100" disabled>
                    <input type="hidden" name="paket_id" value="{{ $detail->paket_id }}">
                </div>
    
                <!-- <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Judul</label>
                    <input type="text" name="judul" class="w-full border-gray-300 rounded-md shadow-sm" value="{{ $detail->judul }}">
                </div> -->
    
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="deskripsi" class="w-full border-gray-300 rounded-md shadow-sm" rows="4">{{ $detail->deskripsi }}</textarea>
                </div>
    
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Fasilitas</label>
                    <textarea name="fasilitas" class="w-full border-gray-300 rounded-md shadow-sm" rows="3">{{ $detail->fasilitas }}</textarea>
                </div>
    
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Jadwal</label>
                    <textarea name="jadwal" class="w-full border-gray-300 rounded-md shadow-sm" rows="2">{{ $detail->jadwal }}</textarea>
                </div>
    
                <button class="bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700">Update Detail</button>
            </form>
    
        </div>
    </div>
</x-app-layout>
