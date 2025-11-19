<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Kelola Paket</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto">
        <a href="{{ route('admin.paket.create') }}" class="bg-blue-600 text-black px-4 py-2 rounded">+ Tambah Paket</a>

        <div class="mt-4 bg-white shadow rounded-lg p-6">
            @if (session('success'))
                <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">{{ session('success') }}</div>
            @endif

            <table class="w-full border-collapse border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border p-2">Nama Paket</th>
                        <th class="border p-2">Deskripsi</th>
                        <th class="border p-2">Harga</th>
                        <th class="border p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($paket as $item)
                        <tr>
                            <td class="border p-2">{{ $item->nama_paket }}</td>
                            <td class="border p-2">{{ $item->deskripsi }}</td>
                            <td class="border p-2">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td class="border p-2 text-center">
                                <a href="{{ route('admin.paket.edit', $item->id) }}" class="text-blue-600">Edit</a> |
                                <a href="{{ route('detail.show', $item->id) }}">Detail</a> |
                                <form action="{{ route('admin.paket.destroy', $item->id) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus?')" class="text-red-600">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="p-4 text-center">Belum ada data</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
