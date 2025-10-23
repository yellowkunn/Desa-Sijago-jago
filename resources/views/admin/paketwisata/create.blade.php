@extends('../components.mainadmin')
@section('container')
    <div class="sm:ml-64">
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 mb-4 rounded-lg">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class=" bg-red-100 text-red-700 p-4 mb-4 rounded-lg">
                {{ session('error') }}
            </div>
        @endif
    </div>
    <div class="max-w-3xl mx-auto py-12 px-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Paket Wisata</h1>

        <form action="{{ route('paketwisata.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <input type="hidden" name="title" value="Paket Wisata">
            </div>

            <div>
                <input type="hidden" name="deskripsi" value="{{ old('deskripsi', $deskripsi ?? '') }}">
            </div>

            <div>
                <label class="block text-gray-700">Gambar</label>
                <input type="file" name="gambar" required class="w-full rounded-lg p-3 mt-1">
            </div>

            <div>
                <label class="block text-gray-700">Nama Paket Wisata</label>
                <input type="text" name="cardTitle" required class="w-full border rounded-lg p-3 mt-1">
            </div>

            <div>
                <label class="block text-gray-700">Harga</label>
                <input type="text" name="harga" required class="w-full border rounded-lg p-3 mt-1">
            </div>

            <div class="flex space-x-3">
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-xl shadow hover:bg-blue-700">
                    Simpan Perubahan
                </button>
                <a href="{{ route('paketwisata.index') }}"
                    class="bg-gray-400 text-white px-6 py-3 rounded-xl shadow hover:bg-gray-500">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
