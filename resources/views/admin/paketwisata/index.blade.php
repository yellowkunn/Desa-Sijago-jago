@extends('../components.mainadmin')
@section('container')
    <div class="sm:ml-64">
    <div class="w-full h-[200px] lg:h-[300px]">
        <img src="{{ asset($background) }}" class="w-full h-full object-cover brightness-75" alt="Background">
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

        <div class="lg:pt-[100px] pt-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-0 md:px-8 2xl:px-0">
                <div class="flex flex-wrap gap-3 mb-6">
                    <a href="{{ route('paketwisata.create') }}"
                        class="bg-blue-600 text-white px-5 py-2 rounded-lg shadow hover:bg-blue-700">
                        + Tambah Paket
                    </a>

                    <a href="{{ route('paketwisata2.create') }}"
                        class="bg-blue-600 text-white px-5 py-2 rounded-lg shadow hover:bg-blue-700">
                        + Tambah Paket Perjalanan
                    </a>

                    <a href="{{ route('paketwisata.editkonten') }}"
                        class="bg-blue-600 text-white px-5 py-2 rounded-lg shadow hover:bg-blue-700">
                        Edit Paket
                    </a>
                </div>


                <div class="bg-white rounded-lg">

                    <h1 class="mb-2 text-xl lg:text-[48px] font-semibold leading-tight text-black">
                        {{ $title ?? 'Paket Wisata' }}
                    </h1>

                    <div
                        class="font-normal lg:text-[16px] text-xs text-black leading-relaxed mt-[20px] lg:mt-[30px] space-y-6">
                        <p>{{ $deskripsi }}</p>
                    </div>

                    <div class="font-medium text-xs lg:text-base text-black leading-relaxed mt-[20px] sm:mt-[50px]-">
                        <div class="grid grid-cols-2 gap-4 gap-y-10 gap-x-10 lg:gap-x-24">

                            @forelse ($paketwisata as $item)
                                <div class="">
                                    <img class="h-[120px] sm:h-[180px] md:h-[220px] lg:h-[360px] w-full object-cover rounded-3xl"
                                        src="{{ asset($item->gambar) }}" alt="{{ $item->cardTitle }}">

                                    <h5 class="mt-5 text-center font-semibold">{{ $item->cardTitle }}</h5>
                                    <p class="text-center text-gray-600">Harga mulai dari: {{ $item->harga }}</p>

                                    <div class="mt-4 flex gap-2 justify-center">
                                        <a href="{{ route('paketwisata.edit', $item->id) }}"
                                            class="bg-yellow-500 text-white px-3 py-1 rounded-lg">Edit</a>
                                        <form action="{{ route('paketwisata.destroy', $item) }}" method="POST"
                                            onsubmit="return confirm('Produk yang dihapus tidak akan bisa dikembalikan, apakah ingin tetap menghapus?')">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-600 text-white px-3 py-1 rounded-lg">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500">Belum ada paket wisata.</p>
                            @endforelse

                        </div>

                    </div>

                    <div class="font-medium text-xs lg:text-base text-black leading-relaxed mt-[20px] sm:mt-[50px]">
                        <div class="grid grid-cols-1 gap-4 gap-y-10 gap-x-10 lg:gap-x-24">
                            <div class="relative overflow-x-auto sm:rounded-lg mb-12">
                                <h1 class="text-2xl font-bold text-gray-800 mb-6">Daftar Paket Perjalanan </h1>

                                @forelse ($pakets as $paket)
                                    <h2 class="text-xl font-semibold text-gray-700 mb-4 flex items-center justify-between">
                                        Paket: {{ $paket->label }}
                                    </h2>

                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-12">
                                        <table class="w-full text-sm text-left text-gray-500">
                                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">Hari</th>
                                                    <th scope="col" class="px-6 py-3">Waktu</th>
                                                    <th scope="col" class="px-6 py-3">Deskripsi</th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Aksi
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($paket->itineraries as $itinerary)
                                                    <tr class="bg-white border-b border-gray-200">
                                                        <th scope="row"
                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                            {{ $itinerary->hari }}
                                                        </th>
                                                        <td class="px-6 py-4">
                                                            {{ $itinerary->waktu }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $itinerary->deskripsi }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <a href="{{ route('paketwisata2.edit', $paket->id) }}"
                                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @empty
                                    <p class="text-gray-500">Belum ada paket perjalanan wisata.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection