        <div class="lg:pt-[50px] pt-12">
            <div class="flex justify-center">
                <div class="max-w-4xl">
                    <h1 class="mb-2 mt-[10px] text-3xl lg:text-6xl font-medium text-center leading-tight text-black">
                        Informasi Kontak
                    </h1>
                </div>
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
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15952.737581881021!2d99.30850729984083!3d1.6398039734086833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302c259c21ea078b%3A0x7d59f44235eedecd!2sBunga%20Bondar%2C%20Kec.%20Sipirok%2C%20Kabupaten%20Tapanuli%20Selatan%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1759403151230!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                                    <p class="text-black">{{ $kontak->whatsapp ?? 'Nomor WhatsApp belum tersedia' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
