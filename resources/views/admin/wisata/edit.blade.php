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
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Destinasi Wisata</h1>

        <form action="{{ route('wisata.update', $wisatum->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf @method('PUT')

            <div>
                <input type="hidden" name="title" value="Destinasi Wisata">
            </div>

            <div>
                <label class="block text-gray-700">Nama Wisata</label>
                <input type="text" name="cardTitle" value="{{ old('cardTitle', $wisatum->cardTitle) }}"
                    class="w-full border rounded-lg p-3 mt-1" required>
            </div>

            <div>
                <label class="block text-gray-700">Deskripsi</label>
                <textarea name="cardContent" rows="4" class="w-full border rounded-lg p-3 mt-1" required>{{ old('cardContent', $wisatum->cardContent) }}</textarea>
            </div>

            <div>
                <label class="block text-gray-700">Gambar</label>
                <input type="file" name="gambar" id="gambarInput" class="w-full rounded-lg p-3 mt-1">

                <img id="previewImage" class="w-32 h-32 mt-3 rounded-lg shadow hidden object-cover">


                @if ($wisatum && $wisatum->gambar)
                    <img src="{{ asset($wisatum->gambar) }}" id="currentImage"
                        class="w-64 h-32 object-cover mt-3 rounded-lg shadow">
                @endif
            </div>

            <div class="flex space-x-3">
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-xl shadow hover:bg-blue-700">
                    Simpan Perubahan
                </button>
                <a href="{{ route('wisata.index') }}"
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
