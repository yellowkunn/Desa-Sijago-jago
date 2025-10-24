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

        {{-- HERO SECTION --}}
        <div class="w-full h-[45vh] lg:h-[90vh] relative overflow-hidden">
            <img src="{{ asset($hero->background) }}"
                class="w-full h-full object-cover absolute top-0 left-0 z-0 brightness-50" alt="Background">

            <div
                class="relative z-10 w-full h-full flex items-center justify-center md:ml-32 sm:ml-20 ml-0 text-center sm:justify-start sm:text-start">
                <div class="lg:max-w-2xl md:max-w-lg max-w-lg space-y-6 lg:space-y-12">
                    <div class="text-md md:text-lg lg:text-3xl font-semibold leading-tight text-gray-900 dark:text-white">
                        {{ $hero->title1 }}
                    </div>
                    <div class="text-4xl md:text-4xl lg:text-7xl font-semibold leading-tight text-gray-900 dark:text-white">
                        {{ $hero->title2 }}
                    </div>
                    <a href="{{ $hero->hubungikami ?? '#' }}"
                        class="text-xs md:text-md lg:text-xl inline-flex items-center px-24 py-4 bg-[#485A10] text-white rounded-full no-underline">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>

        {{-- TENTANG SECTION --}}
        <div class="lg:pt-[100px]">
            <div class="max-w-7xl mx-auto px-4 sm:px-0 md:px-8 2xl:px-0">

                {{-- Tombol Edit Section --}}
                <div class="flex flex-wrap justify-center gap-3 mb-10">
                    <a href="{{ route('dashboard.edit', $hero->id) }}"
                        class="bg-blue-600 text-white px-5 py-2 rounded-lg shadow hover:bg-blue-700">
                        Edit Hero
                    </a>

                    <a href="{{ route('dashboard.edit', $tentang->id) }}"
                        class="bg-blue-600 text-white px-5 py-2 rounded-lg shadow hover:bg-blue-700">
                        Edit Tentang
                    </a>

                    <a href="{{ route('dashboard.edit', $destinasi->id) }}"
                        class="bg-blue-600 text-white px-5 py-2 rounded-lg shadow hover:bg-blue-700">
                        Edit Destinasi
                    </a>
                </div>

                {{-- Konten Tentang --}}
                <div class="flex flex-wrap xl:justify-between justify-center gap-y-7">
                    <div class="2xl:max-w-3xl xl:max-w-xl max-w-full bg-white rounded-lg content-center p-6">
                        <h5 class="mb-2 text-xs lg:text-2xl font-normal text-center tracking-tight text-black">
                            {{ $tentang->title1 }}
                        </h5>

                        <h1 class="mb-2 mt-[10px] text-3xl lg:text-8xl font-bold text-center text-black">
                            {{ $tentang->title2 }}
                        </h1>

                        <p class="mt-5 text-xs lg:text-[16px] font-normal text-center text-black leading-relaxed">
                            {{ $tentang->konten }}
                        </p>
                    </div>

                    <div class="2xl:max-w-3xl xl:max-w-xl max-w-full">
                        <img class="lg:h-[480px] lg:w-[480px] h-[362px] w-[362px] object-cover rounded-2xl"
                            src="{{ asset($tentang->background) }}" alt="{{ $tentang->title2 }}">
                    </div>
                </div>
            </div>
        </div>


        {{-- DESTINASI SECTION --}}
        <div class="lg:pt-[150px] pt-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-0 md:px-8 2xl:px-0">
                <div class="flex justify-center">
                    <div class="max-w-4xl">
                        <h1 class="mb-2 mt-[10px] text-3xl lg:text-[60px] font-medium text-center leading-tight text-black">
                            {{ $destinasi->title1 }}
                        </h1>
                        <h4
                            class="mt-[20px] text-xs lg:text-[22px] font-normal text-center leading-loose tracking-normal text-black max-w-2xl mx-auto">
                            {{ $destinasi->konten }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>

        @php
            $count = $wisataRow1->count();
        @endphp

        @if ($count === 1)
            <div class="lg:pt-[65px] pt-[20px]">
                <div class="max-w-7xl mx-auto px-4 md:px-8 2xl:px-0">
                    @foreach ($wisataRow1 as $item)
                        <img class="w-full h-[250px] lg:h-[400px] object-cover shadow-lg rounded-lg lg:rounded-2xl"
                            src="{{ asset($item->gambar) }}" alt="{{ $item->cardTitle }}">
                    @endforeach
                </div>
            </div>
        @elseif ($count < 3)
            <div class="lg:pt-[65px] pt-[20px]">
                <div class="max-w-7xl mx-auto px-4 md:px-8 2xl:px-0">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 lg:gap-8">
                        @forelse ($wisataRow1 as $item)
                            <img class="w-full h-[180px] md:h-[250px] lg:h-[320px] object-cover shadow-lg rounded-lg lg:rounded-2xl"
                                src="{{ asset($item->gambar) }}" alt="{{ $item->cardTitle }}">
                        @empty
                            <p class="text-gray-500 col-span-2">Belum ada destinasi wisata.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        @else
            <div class="lg:pt-[65px] pt-[20px]">
                <div class="max-w-7xl mx-auto px-4 md:px-8 2xl:px-0 space-y-5 lg:space-y-20">

                    <!-- Row 1 -->
                    <div class="flex justify-between items-center flex-wrap gap-4">
                        @forelse ($wisataRow1 as $item)
                            <img class="h-[150px] w-[105px] md:h-[228px] md:w-[205px] lg:h-[300px] lg:w-[270px] object-cover shadow-lg rounded-lg lg:rounded-2xl"
                                src="{{ asset($item->gambar) }}" alt="{{ $item->cardTitle }}">
                        @empty
                            <p class="text-gray-500">Belum ada destinasi wisata.</p>
                        @endforelse
                    </div>

                    <!-- Row 2 -->
                    @if (!empty($wisataRow2?->gambar))
                        <img class="h-[150px] lg:h-[300px] w-full object-cover shadow-lg rounded-lg lg:rounded-2xl"
                            src="{{ asset($wisataRow2->gambar) }}" alt="{{ $wisataRow2->cardTitle }}">
                    @endif

                </div>
            </div>
        @endif


        <div class="lg:pt-[80px] pt-[20px] mb-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-0 md:px-8 2xl:px-0">
                <div class="flex justify-center">
                    <a href="{{ route('wisata.index') }}"
                        class="inline-flex font-normal items-center px-4 py-2 lg:px-8 lg:py-4 text-black rounded-xl lg:rounded-2xl lg:border-2 border-black text-xs lg:text-xl no-underline">
                        Lihat Wisata
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
