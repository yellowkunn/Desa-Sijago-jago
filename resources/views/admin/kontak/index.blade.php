@extends('../components.mainadmin')
@section('container')
    <div class="sm:ml-64">
    <div class="w-full h-[45vh] lg:h-[90vh] relative overflow-hidden">
            <img src="{{ asset($kontak->background) }}" class="w-full h-full object-cover absolute top-0 left-0 z-0 brightness-75"
                alt="Background">
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
            <div class="max-w-7xl mx-auto px-4 sm:px-0 md:px-8 2xl:px-0 mb-12">
                <a href="{{ route('kontak.edit') }}"
                    class="bg-blue-600 text-white px-5 py-2 rounded-lg shadow hover:bg-blue-700 mb-6 inline-block">
                    Edit Informasi Kontak
                </a>
                <h1 class="mb-2 text-xl lg:text-[48px] font-semibold leading-tight text-black"">{{ $title ?? 'Peta' }}</h1>
            </div>
        </div>

        <div>
            <div class="max-w-7xl mx-auto px-4 sm:px-0 md:px-8 2xl:px-0 pt-[45px] pb-[100px]">
                <div class="flex flex-wrap gap-8">
                    <!-- MAP -->
                    <div class="w-full md:basis-[calc(50%-1rem)]">
                        <div class="h-[300px] rounded-3xl overflow-hidden shadow-lg">
                            @if (!empty($kontak->maps))
                                {!! $kontak->maps !!}
                            @else
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31916.686612790814!2d97.76707602963145!3d0.6185414598592721!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30288020d8d08c0b%3A0x8954966da06e7a63!2sBawomataluo%2C%20Kec.%20Fanayama%2C%20Kabupaten%20Nias%20Selatan%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1759313285729!5m2!1sid!2sid"
                                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            @endif
                        </div>
                    </div>

                    <!-- KONTAK -->
                    <div class="w-full md:basis-[calc(50%-1rem)]">
                        <div class="rounded-3xl shadow-lg bg-[#D9D9D9] p-8 space-y-6">
                            <!-- Lokasi -->
                            <div class="flex items-start space-x-3">
                                <img src="{{ URL('images/map.svg') }}" alt="icon" class="lg:w-8 lg:h-8 w-7 h-7">
                                <div>
                                    <div class="font-semibold text-black">Lokasi:</div>
                                    <p class="text-black">{{ $kontak->lokasi ?? 'Lokasi belum tersedia' }}</p>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="flex items-start space-x-3">
                                <img src="{{ URL('images/email.svg') }}" alt="icon" class="lg:w-8 lg:h-8 w-7 h-7">
                                <div>
                                    <div class="font-semibold text-black">Email:</div>
                                    <p class="text-black">{{ $kontak->email ?? 'Email belum tersedia' }}</p>
                                </div>
                            </div>

                            <!-- WhatsApp -->
                            <div class="flex items-start space-x-3">
                                <img src="{{ URL('images/phone.svg') }}" alt="icon" class="lg:w-8 lg:h-8 w-7 h-7">
                                <div>
                                    <div class="font-semibold text-black">WhatsApp:</div>
                                    <p class="text-black">{{ $kontak->whatsapp ?? 'Nomor WhatsApp belum tersedia' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
