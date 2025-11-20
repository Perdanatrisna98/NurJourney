<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kelola Detail Paket
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto">

        <div class="mt-4 bg-white shadow rounded-lg p-6">

            {{-- Alert --}}
            @if (session('success'))
                <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('admin.detail.create') }}"class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Detail Paket</a>

            <div class="overflow-x-auto">
                <table class="w-full border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="border p-2">No</th>
                            <th class="border p-2">Nama Paket</th>
                            <th class="border p-2">Deskripsi</th>
                            <th class="border p-2">Fasilitas</th>
                            <th class="border p-2">Jadwal</th>
                            <th class="border p-2 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($details as $i => $d)
                            <tr>
                                <td class="border p-2 text-center">{{ $i + 1 }}</td>

                                <td class="border p-2">
                                    {{ $d->paket->nama_paket ?? '-' }}
                                </td>

                                <td class="border p-2">
                                    {{ Str::limit($d->deskripsi, 40) }}
                                </td>

                                <td class="border p-2">
                                    {{ Str::limit($d->fasilitas, 40) }}
                                </td>

                                <td class="border p-2">
                                    {{ Str::limit($d->jadwal, 40) }}
                                </td>

                                <td class="border p-2 text-center">
                                    <a href="{{ route('admin.detail.edit', $d->id) }}" class="text-yellow-600 hover:underline">Edit</a>

                                    <form action="{{ route('admin.detail.destroy', $d->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600 ml-2 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="p-4 text-center text-gray-500">
                                    Belum ada detail paket.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</x-app-layout>
