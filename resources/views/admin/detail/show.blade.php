<x-app-layout>
    <h1>Detail Paket Admin</h1>

    <table class="table-auto w-full border border-gray-300 mt-4">
        <tr class="bg-gray-200">
            <th class="border px-4 py-2">Field</th>
            <th class="border px-4 py-2">Value</th>
        </tr>
        <tr>
            <td class="border px-4 py-2">Nama Paket</td>
            <td class="border px-4 py-2">{{ $detail->nama_paket }}</td>
        </tr>
        <tr>
            <td class="border px-4 py-2">Kategori</td>
            <td class="border px-4 py-2">{{ $detail->kategori }}</td>
        </tr>
        <tr>
            <td class="border px-4 py-2">Harga</td>
            <td class="border px-4 py-2">Rp {{ number_format($detail->harga, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td class="border px-4 py-2">Deskripsi</td>
            <td class="border px-4 py-2">{{ $detail->deskripsi }}</td>
        </tr>
        <tr>
            <td class="border px-4 py-2">Gambar</td>
            <td class="border px-4 py-2">
                <img src="{{ asset($detail->gambar) }}" alt="{{ $detail->nama_paket }}" class="w-32 h-auto">
            </td>
        </tr>
    </table>
</x-app-layout>
