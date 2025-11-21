<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Data Jamaah
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded p-6">

                <h3 class="text-lg font-semibold mb-4">Daftar Jamaah</h3>

                @if (session('success'))
                    <div class="bg-green-200 text-green-800 p-3 rounded mb-3">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="w-full border">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="p-2 border">Nama</th>
                            <th class="p-2 border">NIK</th>
                            <th class="p-2 border">Jenis Kelamin</th>
                            <th class="p-2 border">Tempat Lahir</th>
                            <th class="p-2 border">Tanggal Lahir</th>
                            <th class="p-2 border">Alamat</th>
                            <th class="p-2 border">WA</th>
                            <th class="p-2 border">Kelompok</th>
                            <th class="p-2 border">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($jamaah as $item)
                            <tr>
                                <td class="p-2 border">{{ $item->nama }}</td>
                                <td class="p-2 border">{{ $item->nik }}</td>
                                <td class="p-2 border">{{ $item->jenis_kelamin }}</td>
                                <td class="p-2 border">{{ $item->tempat_lahir }}</td>
                                <td class="p-2 border">{{ $item->tanggal_lahir }}</td>
                                <td class="p-2 border">{{ $item->alamat }}</td>
                                <td class="p-2 border">{{ $item->wa }}</td>
                                <td class="p-2 border">{{ $item->kelompok }}</td>
                                <td class="p-2 border flex gap-2">
                                    <a href="{{ route('staff.jamaah.edit', $item->id) }}" class="text-yellow-600 hover:underline">Edit </a> |
                                    <form action="{{ route('staff.jamaah.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 ml-2 hover:underline"> Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>
        </div>
    </div>
</x-app-layout>
