<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Kelola Staff</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto">
        <a href="{{ route('admin.staff.create') }}" class="bg-blue-600 text-black px-4 py-2 rounded mb-4 inline-block">+ Tambah Staff</a>
        <div class="mt-4 bg-white shadow rounded-lg p-6">
            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded mb-3">{{ session('success') }}</div>
            @endif
    
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <table class="w-full border-collapse border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border p-2">Nama</th>
                            <th class="border p-2">Email</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($staffs as $staff)
                            <tr>
                                <td class="border p-2">{{ $staff->name }}</td>
                                <td class="border p-2">{{ $staff->email }}</td>
                                <td class="border p-2 text-center">
                                    <a href="{{ route('admin.staff.edit', $staff) }}" class="text-blue-600">Edit</a> |
                                    <form action="{{ route('admin.staff.destroy', $staff) }}" method="POST"  class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Yakin hapus?')" class="text-red-600">Hapus</button>
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