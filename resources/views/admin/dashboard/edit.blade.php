@extends('../components.mainadmin')
@section('container')
    <div class="max-w-4xl mx-auto py-12 px-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">
            Edit {{ ucfirst($dashboard->section) }} Section
        </h1>

        <form action="{{ route('dashboard.update', $dashboard->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Title1 (selalu ada) --}}
            <div>
                <label class="block text-gray-700">Title 1</label>
                <input type="text" name="title1" value="{{ old('title1', $dashboard->title1 ?? '') }}"
                    class="w-full border rounded-lg p-3 mt-1">
            </div>

            {{-- Title2 (tidak ada di section = destinasi, paket) --}}
            @if (!in_array($dashboard->section, ['destinasi', 'paket']))
                <div>
                    <label class="block text-gray-700">Title 2</label>
                    <input type="text" name="title2" value="{{ old('title2', $dashboard->title2 ?? '') }}"
                        class="w-full border rounded-lg p-3 mt-1">
                </div>
            @endif

            {{-- Konten (tidak ada di section = hero, paket) --}}
            @if (!in_array($dashboard->section, ['hero', 'paket']))
                <div>
                    <label class="block text-gray-700 mb-2">Konten</label>
                    <textarea name="konten" rows="6" class="w-full border rounded-lg px-3 py-2">{{ old('konten', $dashboard->konten ?? '') }}</textarea>
                </div>
            @endif

            {{-- Background (tidak ada di section = paket) --}}
            @if (!in_array($dashboard->section, ['destinasi', 'paket']))
                <div>
                    <label class="block text-gray-700">Background</label>
                    <input type="file" name="background" id="backgroundInput" class="w-full rounded-lg p-3 mt-1">

                    {{-- Preview baru --}}
                    <img id="previewBackground" class="w-64 h-32 mt-3 rounded-lg shadow hidden object-cover">

                    {{-- Jika sudah ada background lama --}}
                    @if ($dashboard && $dashboard->background)
                        <img src="{{ asset($dashboard->background) }}" id="currentBackground"
                            class="w-64 h-32 object-cover mt-3 rounded-lg shadow">
                    @endif
                </div>
            @endif

            <div class="flex space-x-3">
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-xl shadow hover:bg-blue-700">
                    Simpan Perubahan
                </button>
                <a href="{{ route('dashboard.index') }}"
                    class="bg-gray-400 text-white px-6 py-3 rounded-xl shadow hover:bg-gray-500">
                    Batal
                </a>
            </div>
        </form>

        <script>
            // Preview untuk Background
            document.getElementById('backgroundInput')?.addEventListener('change', function(event) {
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
