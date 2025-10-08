@extends('../components.mainadmin')
@section('container')
    <div class="max-w-5xl mx-auto py-12 px-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Paket Wisata</h1>

        <form action="{{ route('paketwisata2.store') }}" method="POST" class="space-y-8">
            @csrf

            {{-- Label Paket (misalnya 3D2N, 2D1N, dll) --}}
            <div>
                <label class="block text-gray-700 font-semibold">Label Paket</label>
                <select name="label" required class="w-full border rounded-lg p-3 mt-1">
                    <option value="" disabled selected>Pilih Label Paket</option>
                    @foreach ($availableLabels as $label)
                        <option value="{{ $label }}">{{ $label }}</option>
                    @endforeach
                </select>

            </div>

            {{-- Itinerary --}}
            <div>
                <label class="block text-gray-700 mb-3 text-lg font-semibold">Itinerary Paket Wisata</label>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">Hari</th>
                                <th scope="col" class="px-6 py-3">Waktu</th>
                                <th scope="col" class="px-6 py-3">Deskripsi</th>
                                <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="itinerary-table">
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4">
                                    <input type="text" name="itinerary[0][hari]" placeholder="Hari 1"
                                        class="w-full border rounded-lg p-2">
                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="itinerary[0][waktu]" placeholder="07.00-10.00"
                                        class="w-full border rounded-lg p-2">
                                </td>
                                <td class="px-6 py-4">
                                    <textarea name="itinerary[0][deskripsi]" rows="2" placeholder="Deskripsi kegiatan..."
                                        class="w-full border rounded-lg p-2"></textarea>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <button type="button"
                                        class="remove-row bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                {{-- Tombol tambah baris itinerary --}}
                <div class="mt-4">
                    <button type="button" id="add-row"
                        class="bg-green-600 text-white px-6 py-2 rounded-xl shadow hover:bg-green-700">
                        + Tambah Baris
                    </button>
                </div>
            </div>

            {{-- Tombol Submit --}}
            <div class="flex space-x-3">
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-xl shadow hover:bg-blue-700">
                    Simpan Paket
                </button>
                <a href="{{ route('paketwisata.index') }}"
                    class="bg-gray-400 text-white px-6 py-3 rounded-xl shadow hover:bg-gray-500">
                    Batal
                </a>
            </div>
        </form>
    </div>

    {{-- Script JS untuk tambah baris itinerary --}}
    <script>
        let rowIndex = 1;
        document.getElementById("add-row").addEventListener("click", function() {
            let table = document.getElementById("itinerary-table");
            let newRow = document.createElement("tr");
            newRow.classList.add("bg-white", "border-b");
            newRow.innerHTML = `
                <td class="px-6 py-4">
                    <input type="text" name="itinerary[${rowIndex}][hari]" placeholder="Hari ${rowIndex+1}"
                        class="w-full border rounded-lg p-2">
                </td>
                <td class="px-6 py-4">
                    <input type="text" name="itinerary[${rowIndex}][waktu]" placeholder="07.00-10.00"
                        class="w-full border rounded-lg p-2">
                </td>
                <td class="px-6 py-4">
                    <textarea name="itinerary[${rowIndex}][deskripsi]" rows="2" placeholder="Deskripsi kegiatan..."
                        class="w-full border rounded-lg p-2"></textarea>
                </td>
                <td class="px-6 py-4 text-center">
                    <button type="button"
                        class="remove-row bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600">
                        Hapus
                    </button>
                </td>
            `;
            table.appendChild(newRow);
            rowIndex++;
        });

        // Event hapus baris
        document.addEventListener("click", function(e) {
            if (e.target && e.target.classList.contains("remove-row")) {
                e.target.closest("tr").remove();
            }
        });
    </script>
@endsection
