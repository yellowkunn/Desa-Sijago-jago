@extends('../components.mainadmin')
@section('container')
    <div class="sm:ml-64">
    <div class="w-full h-[200px] lg:h-[300px]">
        <img src="{{ asset($about->background) }}" class="w-full h-full object-cover brightness-75" alt="Background">
    </div>
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

        <div class="lg:pt-[150px] pt-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-0 md:px-8 2xl:px-0">

                <div class="flex flex-wrap">
                    <a href="{{ route('produkdesa.create') }}"
                        class="bg-blue-600 text-white px-5 py-2 rounded-lg shadow hover:bg-blue-700 mb-6 inline-block">
                        + Tambah Produk
                    </a>

                    <a href="{{ route('produkdesa.editkonten') }}"
                        class="bg-blue-600 text-white px-5 py-2 mx-2 rounded-lg shadow hover:bg-blue-700 mb-6 inline-block">
                        Edit
                    </a>
                </div>
                <div class="flex flex-wrap">

                    <div class="bg-white rounded-lg shadow-sm">

                        {{-- Title --}}
                        <h1 class="mb-2 text-xl lg:text-[48px] font-semibold leading-tight text-black">
                            {{ $title }}
                        </h1>

                        {{-- Deskripsi --}}
                        <div
                            class="font-normal lg:text-[16px] text-xs text-black leading-relaxed mt-[20px] lg:mt-[30px] space-y-6">
                            <p>{{ $deskripsi }}</p>
                        </div>

                        {{-- Produk List --}}
                        <div class="font-medium text-xs lg:text-base text-black leading-relaxed mt-[20px] sm:mt-[50px] mb-12">
                            <div class="grid grid-cols-2 xl:grid-cols-4 gap-4 gap-x-10 gap-y-10">
                                @forelse($produkdesa as $item)
                                    <div>
                                        <img class="h-[150px] sm:h-[180px] md:h-[220px] lg:h-[240px] 2xl:h-[260px] w-full object-cover rounded-3xl"
                                            src="{{ asset($item->gambar) }}" alt="{{ $item->cardTitle }}">
                                        <h5 class="mt-5 text-center">{{ $item->cardTitle }}</h5>
                                        
                                        <div class="mt-4 flex gap-2 justify-center">
                                            <a href="{{ route('produkdesa.edit', $item->id) }}"
                                                class="bg-yellow-500 text-white px-3 py-1 rounded-lg">Edit</a>
                                            <form action="{{ route('produkdesa.destroy', $item) }}" method="POST"
                                                onsubmit="return confirm('Produk yang dihapus tidak akan bisa dikembalikan, apakah ingin tetap menghapus?')">
                                                @csrf @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-600 text-white px-3 py-1 rounded-lg">Hapus</button>
                                            </form>
                                        </div>
                                    </div>

                                @empty
                                    <p class="text-gray-500 col-span-full text-center">Belum ada produk desa.</p>
                                @endforelse
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
