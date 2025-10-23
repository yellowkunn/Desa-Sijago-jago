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
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Tentang Kami</h1>

        <form action="{{ route('about.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label class="block text-gray-700">Title</label>
                <input type="text" name="title" value="{{ old('title', $about->title ?? '') }}"
                    class="w-full border rounded-lg p-3 mt-1">
            </div>

            <!-- Input Background -->
            <div>
                <label class="block text-gray-700">Background</label>
                <input type="file" name="background" id="backgroundInput" class="w-full rounded-lg p-3 mt-1">

                <!-- Preview baru -->
                <img id="previewBackground" class="w-64 h-32 mt-3 rounded-lg shadow hidden object-cover">

                @if ($about && $about->background)
                    <img src="{{ asset($about->background) }}" id="currentBackground"
                        class="w-64 h-32 object-cover mt-3 rounded-lg shadow">
                @endif
            </div>

            <div>
                <label class="block text-gray-700 mb-2">Konten</label>
                <textarea name="content" rows="10" class="w-full border rounded-lg px-3 py-2">{{ old('content', $about->content ?? '') }}</textarea>
            </div>

            <div>
                <label class="block text-gray-700">Visi</label>
                <input type="text" name="visi" value="{{ old('visi', $about->visi ?? '') }}"
                    class="w-full border rounded-lg p-3 mt-1">
            </div>

            <div>
                <label class="block text-gray-700">Visi Content</label>
                <textarea name="visiContent" rows="3" class="w-full border rounded-lg p-3 mt-1">{{ old('visiContent', $about->visiContent ?? '') }}</textarea>
            </div>

            <div>
                <label class="block text-gray-700">Misi</label>
                <input type="text" name="misi" value="{{ old('misi', $about->misi ?? '') }}"
                    class="w-full border rounded-lg p-3 mt-1">
            </div>

            <textarea name="misiContent" class="w-full border rounded-lg p-3 mt-1" rows="5">
{{ old('misiContent', isset($about->misiContent) ? implode(', ', json_decode($about->misiContent, true)) : '') }}
</textarea>
            <p class="text-gray-500 text-sm mt-1">Pisahkan poin dengan tanda koma (,)</p>



            <!-- Input Gambar -->
            <div>
                <label class="block text-gray-700">Gambar</label>
                <input type="file" name="gambar" id="gambarInput" class="w-full rounded-lg p-3 mt-1">

                <img id="previewImage" class="w-32 h-32 mt-3 rounded-lg shadow hidden object-cover">

                @if ($about && $about->gambar)
                    <img src="{{ asset($about->gambar) }}" id="currentImage"
                        class="w-64 h-32 object-cover mt-3 rounded-lg shadow">
                @endif
            </div>

            <div class="flex space-x-3">
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-xl shadow hover:bg-blue-700">
                    Simpan Perubahan
                </button>
                <a href="{{ route('about.index') }}"
                    class="bg-gray-400 text-white px-6 py-3 rounded-xl shadow hover:bg-gray-500">
                    Batal
                </a>
            </div>
        </form>

        <script>
            // Preview untuk Gambar
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

            // Preview untuk Background
            document.getElementById('backgroundInput').addEventListener('change', function(event) {
                let preview = document.getElementById('previewBackground');
                let current = document.getElementById('currentBackground');
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
