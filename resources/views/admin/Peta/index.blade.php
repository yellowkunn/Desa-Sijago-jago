@extends('../components.mainadmin')
@section('container')
    <div class="sm:ml-64">
        <div class="w-full h-[50vh] relative overflow-hidden">
            <img src="{{ asset($background) }}" class="w-full h-full object-cover absolute top-0 left-0 z-0 brightness-75"
                alt="Background">
        </div>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 mb-4 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="lg:pt-[150px] pt-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-0 md:px-8 2xl:px-0 mb-12">

                <div class="flex flex-wrap">
                    <a href="{{ route('peta.create') }}"
                        class="bg-blue-600 text-white px-5 py-2 rounded-lg shadow hover:bg-blue-700 mb-6 inline-block">
                        + Tambah Peta
                    </a>

                    <a href="{{ route('peta.editkonten') }}"
                        class="bg-blue-600 text-white px-5 py-2 mx-2 rounded-lg shadow hover:bg-blue-700 mb-6 inline-block">
                        Edit
                    </a>
                </div>

                <h1 class="mb-2 text-xl lg:text-[48px] font-semibold leading-tight text-black"">{{ $title ?? 'Peta' }}</h1>
                @forelse ($peta as $item)
                    <div class="pt-[20px] lg:pt-[50px]"> <img class="h-auto w-screen rounded-lg"
                            src="{{ asset($item->gambar) }}"
                            alt="Peta Rencana Strategis Pariwisata Desa Perkebunan Bukit Lawang"></div>

                    <div class="mt-4 flex gap-2 justify-center">
                        <a href="{{ route('peta.edit', $item->id) }}"
                            class="bg-yellow-500 text-white px-3 py-1 rounded-lg">Edit</a>
                        <form action="{{ route('peta.destroy', $item) }}" method="POST"
                            onsubmit="return confirm('Peta yang dihapus tidak akan bisa dikembalikan, apakah ingin tetap menghapus?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-lg">Hapus</button>
                        </form>
                    </div>
                @empty
                    <p class="text-gray-500 col-span-full text-center">Belum ada peta.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
