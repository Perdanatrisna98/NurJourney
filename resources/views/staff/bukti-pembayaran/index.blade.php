<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Bukti Pembayaran
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded p-6">

                @if(session('success'))
                    <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mb-4 flex justify-between items-center">
                    <h3 class="text-lg font-semibold">Daftar Bukti Pembayaran</h3>
                    <a href="{{ route('staff.bukti-pembayaran.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
    Tambah Bukti
</a>

                </div>

                <table class="w-full border">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="p-2 border">Nama Jamaah</th>
                            <th class="p-2 border">Bukti</th>
                            <th class="p-2 border">Status</th>
                            <th class="p-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bukti as $item)
                            <tr>
                                <td class="p-2 border">{{ $item->jamaah->nama }}</td>
                                <td class="p-2 border">
                                    @if($item->file)
                                        <a href="{{ asset('image/bukti/'.$item->file) }}" target="_blank">
                                            <img src="{{ asset('image/bukti/'.$item->file) }}" alt="Bukti" class="w-20 h-20 object-cover rounded">
                                        </a>
                                    @else
                                        Tidak ada file
                                    @endif
                                </td>
                                <td class="p-2 border capitalize">{{ $item->status }}</td>
                                <td class="p-2 border flex gap-2">
                                    <a href="{{ route('staff.bukti-pembayaran.edit', $item) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">
                                        Edit
                                    </a>
                                    <form action="{{ route('staff.bukti-pembayaran.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center p-4">Belum ada data bukti pembayaran.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
