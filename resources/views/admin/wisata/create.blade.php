@extends('../components.mainadmin')
@section('container')
    <div class="max-w-3xl mx-auto py-12 px-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Destinasi Wisata</h1>

        <form action="{{ route('wisata.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <input type="hidden" name="title" value="Destinasi Wisata">
            </div>


            <div>
                <label class="block text-gray-700">Nama Wisata</label>
                <input type="text" name="cardTitle" required class="w-full border rounded-lg p-3 mt-1">
            </div>

            <div>
                <label class="block text-gray-700">Deskripsi</label>
                <textarea name="cardContent" rows="4" required class="w-full border rounded-lg p-3 mt-1"></textarea>
            </div>

            <div>
                <label class="block text-gray-700">Gambar</label>
                <input type="file" name="gambar" required class="w-full rounded-lg p-3 mt-1">
            </div>

            <div class="flex space-x-3">
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-xl shadow hover:bg-blue-700">
                    Simpan
                </button>
                <a href="{{ route('wisata.index') }}"
                    class="bg-gray-400 text-white px-6 py-3 rounded-xl shadow hover:bg-gray-500">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
