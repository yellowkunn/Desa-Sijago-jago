@extends('components.main')
@section('container')
    <div class="w-full h-[200px] lg:h-[300px]">
        <img src="{{ asset($about->background) }}" class="w-full h-full object-cover brightness-75" alt="Background">
    </div>

    <div class="lg:pt-[150px] pt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-0 md:px-8 2xl:px-0">
            <div class="flex flex-wrap">

                <div class="bg-white rounded-lg shadow-sm">

                    {{-- Title --}}
                    <h1 class="mb-2 text-xl lg:text-[48px] font-semibold leading-tight text-black">
                        {{ $title ?? 'Produk Desa' }}
                    </h1>

                    {{-- Deskripsi --}}
                    <div
                        class="font-normal lg:text-[16px] text-xs text-black leading-relaxed mt-[20px] lg:mt-[30px] space-y-6">
                        <p>{{ $deskripsi }}</p>
                    </div>

                    {{-- Produk List --}}
                    <div class="font-medium text-xs lg:text-base text-black leading-relaxed mt-[20px] sm:mt-[50px]">
                        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 gap-x-10 gap-y-10">
                            @forelse($produkdesa as $item)
                                <div>
                                    <img class="h-[150px] sm:h-[180px] md:h-[220px] 2xl:h-[260px] w-full object-cover rounded-3xl"
                                        src="{{ asset($item->gambar) }}" alt="{{ $item->cardTitle }}">
                                    <h5 class="mt-5 text-center">{{ $item->cardTitle }}</h5>
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
@endsection
