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
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Paket Wisata</h1>

        <form action="{{ route('paketwisata.update', $paketwisata->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf @method('PUT')

            <div>
                <input type="hidden" name="title" value="Paket Wisata">
            </div>

            <div>
                <input type="hidden" name="deskripsi" value="{{ old('deskripsi', $deskripsi ?? '') }}">
            </div>

            <div>
                <label class="block text-gray-700">Nama Paket Wisata</label>
                <input type="text" name="cardTitle" value="{{ old('cardTitle', $paketwisata->cardTitle) }}"
                    class="w-full border rounded-lg p-3 mt-1" required>
            </div>

            <div>
                <label class="block text-gray-700">Gambar</label>
                <input type="file" name="gambar" id="gambarInput" class="w-full rounded-lg p-3 mt-1">

                <img id="previewImage" class="w-32 h-32 mt-3 rounded-lg shadow hidden object-cover">


                @if ($paketwisata && $paketwisata->gambar)
                    <img src="{{ asset($paketwisata->gambar) }}" id="currentImage"
                        class="w-64 h-32 object-cover mt-3 rounded-lg shadow">
                @endif
            </div>

            <div>
                <label class="block text-gray-700">Harga</label>
                <input type="text" name="harga" value="{{ old('harga', $paketwisata->harga) }}"
                    class="w-full border rounded-lg p-3 mt-1" required>
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

        <script>
            document.getElementById('gambarInput').addEventListener('change', function(event) {
                let preview = document.getElementById('previewImage');
                let current = document.getElementById('currentImage');
                let file = event.target.files[0];

                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.classList.remove('hidden');
                        if (current) {
                            current.classList.add('hidden');
                        }
                    };
                    reader.readAsDataURL(file);
                }
            });
        </script>
    </div>
@endsection
