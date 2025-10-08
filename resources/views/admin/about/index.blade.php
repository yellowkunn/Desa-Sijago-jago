@extends('components.mainadmin')
@section('container')
    <div class="sm:ml-64">
        <div class="w-full h-[50vh] relative overflow-hidden">
            <img src="{{ asset($about->background) }}"
                class="w-full h-full object-cover absolute top-0 left-0 z-0 brightness-75" alt="Background">
        </div>
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 mb-4 rounded-lg">
                {{ session('success') }}
            </div>
        @endif



        <div class="lg:pt-[150px] pt-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-0 md:px-8 2xl:px-0">
                <div class="flex flex-wrap">

                    <div class="my-8">
                        <a href="{{ route('about.edit') }}"
                            class="bg-blue-600 text-white px-5 py-2 rounded-xl shadow hover:bg-blue-700">
                            Edit Tentang Kami
                        </a>
                    </div>

                    <div class="bg-white rounded-lg mb-12">

                        {{-- Gambar untuk layar besar (float kanan) --}}
                        <img class="hidden 2xl:block lg:float-right w-[362px] h-[279px] lg:w-[650px] lg:h-[370px] object-cover rounded-2xl lg:ml-6 lg:mb-2 xl:ml-12 xl:mb-12"
                            src="{{ asset($about->gambar) }}" alt="gambar tentang kami">

                        {{-- Judul --}}
                        <h1 class="mb-2 text-xl lg:text-[48px] font-semibold leading-tight text-black">
                            {{ $about->title }}
                        </h1>

                        {{-- Konten --}}
                        <div class="font-normal text-xs lg:text-[14px] text-black leading-loose mt-[18px] space-y-6">
                            @foreach (preg_split('/\r\n|\r|\n/', $about->content) as $i => $paragraf)
                                @if (!empty(trim($paragraf)))
                                    <p>{{ $paragraf }}</p>
                                @endif

                                {{-- Sisipkan gambar setelah paragraf kedua untuk layar kecil --}}
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
                            class="list-decimal text-xs lg:text-[14px] pl-6 mb-3 mt-[18px] font-normal text-black leading-relaxed space-y-2">
                            @foreach (json_decode($about->misiContent, true) as $poin)
                                <li>{{ $poin }}</li>
                            @endforeach
                        </ol>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
