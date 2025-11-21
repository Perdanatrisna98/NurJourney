<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Edit Bukti Pembayaran
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded p-6">
                <form action="{{ route('staff.bukti-pembayaran.update', $bukti->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="file" class="block text-sm font-medium text-gray-700">Upload Bukti</label>
                        <input type="file" name="file" id="file" class="mt-1 block w-full">
                    </div>

                    <div class="mb-4">
                        <label for="jamaah_id" class="block text-sm font-medium text-gray-700">Jamaah</label>
                        <select name="jamaah_id" id="jamaah_id" class="mt-1 block w-full border rounded p-2">
                            @foreach($jamaah as $j)
                                <option value="{{ $j->id }}" {{ $bukti->jamaah_id == $j->id ? 'selected' : '' }}>
                                    {{ $j->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" id="status" class="mt-1 block w-full border rounded p-2">
                            <option value="pending" {{ $bukti->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="valid" {{ $bukti->status == 'valid' ? 'selected' : '' }}>Valid</option>
                        </select>
                    </div>

                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
