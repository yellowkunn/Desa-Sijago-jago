@extends('components.main')
@section('container')    
    <div class="w-full h-[200px] lg:h-[300px]">
        <img src="{{ asset($about->background) }}" class="w-full h-full object-cover brightness-75" alt="Background">
    </div>

    <div class="lg:pt-[150px] pt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-0 md:px-8 2xl:px-0">
            <div class="flex flex-wrap">

                <div class="bg-white rounded-lg">

                    {{-- Gambar untuk layar besar (float kanan) --}}
                    <img class="hidden 2xl:block lg:float-right w-[362px] h-[279px] lg:w-[650px] lg:h-[370px] object-cover rounded-2xl lg:ml-6 lg:mb-2 xl:ml-12 xl:mb-12"
                        src="{{ asset($about->gambar) }}" alt="gambar tentang kami">

                    {{-- Judul --}}
                    <h1 class="mb-2 text-xl lg:text-[48px] font-semibold leading-normal text-black">
                        {{ $about->title }}
                    </h1>

                    {{-- Konten --}}
                    <div class="font-normal text-xs lg:text-[14px] text-black leading-loose mt-[18px] space-y-6">
                        @foreach (preg_split('/\r\n|\r|\n/', $about->content) as $i => $paragraf)
                            @if (!empty(trim($paragraf)))
                                <p>{{ $paragraf }}</p>
                            @endif

                            @if ($i == 2)
                                <img class="block 2xl:hidden mx-auto w-screen h-[279px] object-cover rounded-2xl mb-6"
                                    src="{{ asset($about->gambar) }}" alt="gambar tentang kami">
                            @endif
                        @endforeach
                    </div>



                    {{-- Visi --}}
                    <h5 class="font-normal text-base lg:text-[30px] mt-[18px]">
                        {{ $about->visi }}
                    </h5>
                    <p class="mb-3 mt-[18px] text-xs lg:text-[14px] font-medium text-black leading-relaxed">
                        “{{ $about->visiContent }}”
                    </p>

                    {{-- Misi --}}
                    <h5 class="font-normal text-base lg:text-[30px] mt-[18px]">
                        {{ $about->misi }}
                    </h5>
                    <ol
                        class="list-decimal text-xs lg:text-[14px] pl-6 mb-3 mt-[18px] font-normal text-black leading-relaxed space-y-3">
                        @foreach (json_decode($about->misiContent) as $poin)
                            <li>{{ $poin }}</li>
                        @endforeach
                    </ol>

                </div>
            </div>
        </div>
    </div>
@endsection
