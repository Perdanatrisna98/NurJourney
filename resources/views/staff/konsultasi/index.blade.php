<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Konsultasi') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Daftar Konsultasi</h3>
                <p>Ini adalah halaman Kelola Konsultasi untuk staff.</p>

                {{-- Contoh tombol tambah --}}
                {{--  <a href="{{ route('staff.konsultasi.create') }}"
                   class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                    Tambah Konsultasi
                </a> --}}

                {{-- Nanti di sini bisa kamu isi tabel data konsultasi --}}
            </div>
        </div>
    </div>
</x-app-layout>
