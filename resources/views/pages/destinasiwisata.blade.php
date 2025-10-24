@extends('components.main')

@section('container')
    <div class="w-full h-[200px] lg:h-[300px]">
        <img src="{{ asset($about->background) }}" class="w-full h-full object-cover brightness-75" alt="Background">
    </div>

    <div class="lg:pt-[150px] pt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-0 md:px-8 2xl:px-0">
            <h1 class="mb-2 text-xl lg:text-[48px] font-semibold leading-tight text-black">
                {{ $title ?? 'Destinasi Wisata' }}
            </h1>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-0 md:px-8 2xl:px-0 lg:space-y-[65px] space-y-[20px] pt-[18px]">

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
                </div>
            </div>
        @empty
            <p class="text-gray-500">Belum ada destinasi wisata.</p>
        @endforelse

    </div>
@endsection
