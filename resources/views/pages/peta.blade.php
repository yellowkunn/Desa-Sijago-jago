@extends('components.main')
@section('container')
    <div class="w-full h-[200px] lg:h-[300px]">
        <img src="{{ asset($background) }}" class="w-full h-full object-cover brightness-75" alt="Background">
    </div>

    <div class="lg:pt-[150px] pt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-0 md:px-8 2xl:px-0">
            <h1 class="mb-2 text-xl lg:text-[48px] font-semibold leading-tight text-black">
                {{ $title ?? 'Peta' }}
            </h1>
            @forelse ($peta as $item)
                <div class="pt-[20px] lg:pt-[50px]"> <img class="h-auto w-full rounded-lg" src="{{ asset($item->gambar) }}"
                        alt="Peta Rencana Strategis Pariwisata Desa Perkebunan Bukit Lawang"></div>
            @empty
                <p class="text-gray-500 col-span-full text-center">Belum ada peta.</p>
            @endforelse
        </div>
    </div>
@endsection
