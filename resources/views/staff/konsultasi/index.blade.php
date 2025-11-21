<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Kelola Konsultasi</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Daftar Konsultasi</h3>

                <table class="w-full border">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-2">Nama</th>
                            <th class="border p-2">Panggilan</th>
                            <th class="border p-2">WA</th>
                            <th class="border p-2">Pesan</th>
                            <th class="border p-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($konsultasis as $k)
                        <tr>
                            <td class="border p-2">{{ $k->nama }}</td>
                            <td class="border p-2">{{ $k->panggilan }}</td>
                            <td class="border p-2">{{ $k->wa }}</td>
                            <td class="border p-2">{{ $k->pesan }}</td>
                            <td class="border p-2">
                                <form action="{{ route('staff.konsultasi.status', $k) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" onchange="this.form.submit()" class="border p-1 rounded">
                                        <option value="belum" {{ $k->status == 'belum' ? 'selected' : '' }}>Belum direspon</option>
                                        <option value="sudah" {{ $k->status == 'sudah' ? 'selected' : '' }}>Sudah direspon</option>
                                        <option value="order" {{ $k->status == 'order' ? 'selected' : '' }}>Order</option>
                                    </select>
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
