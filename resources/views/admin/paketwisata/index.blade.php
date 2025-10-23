@extends('../components.mainadmin')
@section('container')
    <div class="sm:ml-64">
    <div class="w-full lg:h-[50vh] h-[25vh] relative overflow-hidden">
        <img src="{{ asset($background) }}" class="w-full h-full object-cover absolute top-0 left-0 z-0 brightness-75"
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
            <div class="max-w-7xl mx-auto px-4 sm:px-0 md:px-8 2xl:px-0">
                <div class="bg-white rounded-lg">

                    {{-- Title --}}
                    <h1 class="mb-2 text-xl lg:text-[48px] font-semibold leading-tight text-black">
                        {{ $title ?? 'Paket Wisata' }}
                    </h1>

                    {{-- Deskripsi --}}
                    <div
                        class="font-normal lg:text-[16px] text-xs text-black leading-relaxed mt-[20px] lg:mt-[30px] space-y-6">
                        <p>{{ $deskripsi }}</p>
                    </div>

                    <div class="font-medium text-xs lg:text-base text-black leading-relaxed mt-[20px] sm:mt-[50px]">
                        <div class="grid grid-cols-2 gap-4 gap-y-10 gap-x-10 lg:gap-x-24">

                            @foreach ($paketwisata as $item)
                                <div class="">
                                    <img class="h-[120px] sm:h-[180px] md:h-[220px] lg:h-[360px] w-full object-cover rounded-3xl"
                                        src="{{ $item->gambar }}" alt="{{ $item->cardTitle }}">

                                    <h5 class="mt-5 text-center font-semibold">{{ $item->cardTitle }}</h5>
                                    <p class="text-center text-gray-600">Harga mulai dari: {{ $item->harga }}</p>
                                </div>
                            @endforeach
                        </div>


                        <div class="font-medium text-xs lg:text-base text-black leading-relaxed mt-[20px] sm:mt-[50px]">
                            <div class="grid grid-cols-1 gap-4 gap-y-10 gap-x-10 lg:gap-x-24">
                                <div class="relative overflow-x-auto sm:rounded-lg">
                                    <h1 class="mb-6 text-2xl lg:text-[48px] font-semibold leading-tight text-black">
                                        Daftar Paket Perjalanan
                                    </h1>

                                    @foreach ($pakets as $paket)
                                        <div class="mb-8">
                                            <h2
                                                class="text-lg font-semibold text-gray-700 mb-4 flex items-center justify-between">
                                                Paket: {{ $paket->label }}
                                            </h2>

                                            <div class="relative overflow-x-auto shadow-lg sm:rounded-lg">
                                                <table
                                                    class="w-full lg:text-sm text-xs text-left text-gray-700 border border-gray-200 table-fixed">
                                                    <thead class="text-gray-700 uppercase bg-gray-100">
                                                        <tr>
                                                            <th scope="col" class="px-6 py-3 w-[20%]">Hari</th>
                                                            <th scope="col" class="px-6 py-3 w-[25%]">Waktu</th>
                                                            <th scope="col" class="px-6 py-3 w-[55%]">Deskripsi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($paket->itineraries as $itinerary)
                                                            <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                                                                <td
                                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                                    {{ $itinerary->hari }}
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                    {{ $itinerary->waktu }}
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                    {{ $itinerary->deskripsi }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </div>
@endsection
