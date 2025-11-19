<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Staff</h2>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg p-6">
            <form action="{{ route('admin.staff.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('name') }}">
                    @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('email') }}">
                    @error('email') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" class="w-full border-gray-300 rounded-md shadow-sm">
                    @error('password') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('admin.staff.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded mr-2">Batal</a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-black rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
