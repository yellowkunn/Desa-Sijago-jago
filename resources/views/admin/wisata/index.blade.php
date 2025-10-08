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
            <div class="max-w-7xl mx-auto px-4 sm:px-0 md:px-8 2xl:px-0">

                <div class="flex flex-wrap">
                    <a href="{{ route('wisata.create') }}"
                        class="bg-blue-600 text-white px-5 py-2 rounded-lg shadow hover:bg-blue-700 mb-6 inline-block">
                        + Tambah Destinasi
                    </a>

                    <a href="{{ route('wisata.editwisata') }}"
                        class="bg-blue-600 text-white px-5 py-2 mx-2 rounded-lg shadow hover:bg-blue-700 mb-6 inline-block">
                        Edit
                    </a>
                </div>
                <h1 class="mb-2 text-xl lg:text-[48px] font-semibold leading-tight text-black">
                    {{ $title ?? 'Destinasi Wisata' }}
                </h1>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-0 md:px-8 2xl:px-0 lg:space-y-[65px] space-y-[20px] pt-[18px] mb-12">

            @forelse ($wisata as $item)
                <div class="flex flex-wrap justify-between">
                    <h5
                        class="block 2xl:hidden 2xl:mb-2 mb-4 lg:text-2xl text-xs font-semibold text-start tracking-tight text-black underline underline-offset-[12px]">
                        {{ $item->cardTitle }}
                    </h5>

                    <div>
                        <img class="2xl:max-w-xl lg:h-[320px] sm:h[320px] w-screen h-[214px] object-cover rounded-3xl"
                            src="{{ asset($item->gambar) }}" alt="{{ $item->cardTitle }}">
                    </div>

                    <div class="2xl:max-w-2xl bg-white rounded-lg 2xl:pl-6 pl-0 w-full">
                        <h5
                            class="hidden 2xl:block mb-2 lg:text-2xl font-semibold text-start tracking-tight text-black underline underline-offset-[12px]">
                            {{ $item->cardTitle }}
                        </h5>

                        <p class="mb-3 mt-[18px] lg:text-[16px] text-xs font-normal text-start text-black leading-relaxed">
                            {!! nl2br(e($item->cardContent)) !!}
                        </p>

                        <div class="mt-6 flex gap-2">
                            <a href="{{ route('wisata.edit', $item->id) }}"
                                class="bg-yellow-500 text-white px-3 py-1 rounded-lg">Edit</a>
                            <form action="{{ route('wisata.destroy', $item->id) }}" method="POST"
                                onsubmit="return confirm('Wisata yang dihapus tidak akan bisa dikembalikan, apakah ingin tetap menghapus?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-lg">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-gray-500">Belum ada destinasi wisata.</p>
            @endforelse

        </div>
    </div>
@endsection
