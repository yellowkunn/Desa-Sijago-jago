@extends('../components.mainadmin')
@section('container')
    <div class="max-w-3xl mx-auto py-12 px-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Peta</h1>

        <form action="{{ route('peta.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <input type="hidden" name="title" value="Peta">
            </div>

            <div>
                <label class="block text-gray-700">Gambar Peta</label>
                <input type="file" name="gambar" required class="w-full rounded-lg p-3 mt-1">
            </div>

            <div class="flex space-x-3">
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-xl shadow hover:bg-blue-700">
                    Simpan Perubahan
                </button>
                <a href="{{ route('peta.index') }}"
                    class="bg-gray-400 text-white px-6 py-3 rounded-xl shadow hover:bg-gray-500">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection

