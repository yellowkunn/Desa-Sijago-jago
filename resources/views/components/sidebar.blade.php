<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
    class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 
          focus:outline-none focus:ring-2 focus:ring-gray-200">
    <span class="sr-only">Open sidebar</span>
    <!-- Icon hamburger -->
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zM2
            10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10zm0
            5.25a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75a.75.75 0 01-.75-.75z">
        </path>
    </svg>
</button>


<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-white text-gray-700
 shadow-lg"
    aria-label="Sidebar">

    <div class="h-full px-3 py-4 overflow-y-auto flex flex-col justify-between">
        <!-- Menu -->
        <ul class="space-y-6 font-medium">
            <li>
                <a href="{{ route('dashboard.index') }}"
                    class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-100 hover:text-[#485A10]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M16 20q-.425 0-.712-.288T15 19v-5q0-.425.288-.712T16 13h5q.425 0 .713.288T22 14v5q0 .425-.288.713T21 20zm-4-9q-.425 0-.712-.288T11 10V5q0-.425.288-.712T12 4h9q.425 0 .713.288T22 5v5q0 .425-.288.713T21 11zm-9 9q-.425 0-.712-.288T2 19v-5q0-.425.288-.712T3 13h9q.425 0 .713.288T13 14v5q0 .425-.288.713T12 20zm0-9q-.425 0-.712-.288T2 10V5q0-.425.288-.712T3 4h5q.425 0 .713.288T9 5v5q0 .425-.288.713T8 11z" />
                    </svg>
                    <span class="ms-3">Home</span>
                </a>
            </li>

            <li>
                <a href="{{ route('about.index') }}"
                    class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-100 hover:text-[#485A10]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 7q.425 0 .713-.288T13 6t-.288-.712T12 5t-.712.288T11 6t.288.713T12 7m-1 8h2V9h-2zm-9 7V4q0-.825.588-1.412T4 2h16q.825 0 1.413.588T22 4v12q0 .825-.587 1.413T20 18H6z" />
                    </svg>
                    <span class="ms-3">Tentang Kami</span>
                </a>
            </li>

            <li>
                <a href="{{ route('wisata.index') }}"
                    class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-100 hover:text-[#485A10]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M5 22V2h2v2h14l-2 5l2 5H7v8zm7.5-11q.825 0 1.413-.587T14.5 9t-.587-1.412T12.5 7t-1.412.588T10.5 9t.588 1.413T12.5 11" />
                    </svg>
                    <span class="ms-3">Destinasi Wisata</span>
                </a>
            </li>

            <li>
                <a href="{{ route('produkdesa.index') }}"
                    class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-100 hover:text-[#485A10]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M5.75 18h-3.5q-.425 0-.712-.288T1.25 17t.288-.712T2.25 16h3.5q.425 0 .713.288T6.75 17t-.288.713T5.75 18m3-4h-4.5q-.425 0-.712-.288T3.25 13t.288-.712T4.25 12h4.5q.425 0 .713.288T9.75 13t-.288.713T8.75 14M6 22q-.825 0-1.412-.587T4 20h1.75q1.25 0 2.125-.875T8.75 17q0-.275-.05-.525T8.575 16h.175q1.25 0 2.125-.875T11.75 13q0-1.275-.875-2.137T8.75 10h-3.5l.25-2q.1-.875.65-1.437T7.5 6h2q.2-1.875 1.288-2.937T13.75 2q1.6 0 2.663 1.188T17.45 6H20q.9.025 1.5.7t.475 1.575l-1.5 12q-.1.75-.663 1.238T18.5 22zm5.5-16h3.975q.025-.825-.562-1.412T13.5 4q-.875 0-1.388.538T11.5 6" />
                    </svg>
                    <span class="ms-3">Produk Desa</span>
                </a>
            </li>

            <li>
                <a href="{{ route('paketwisata.index') }}"
                    class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-100 hover:text-[#485A10]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M7 21v-6.2l-1.1 1.75l-1.7-1.05L12 3l7.8 12.5l-1.7 1.05L17 14.8V21h-4v-5h-2v5zm4-7h2v-2h-2z" />
                    </svg>
                    <span class="ms-3">Paket Wisata</span>
                </a>
            </li>

            <li>
                <a href="{{ route('peta.index') }}"
                    class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-100 hover:text-[#485A10]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="m15 21l-6-2.1l-4.65 1.8q-.5.2-.925-.112T3 19.75v-14q0-.325.188-.575T3.7 4.8L9 3l6 2.1l4.65-1.8q.5-.2.925.113T21 4.25v14q0 .325-.187.575t-.513.375zm-1-2.45V6.85l-4-1.4v11.7z" />
                    </svg>
                    <span class="ms-3">Peta</span>
                </a>
            </li>

            <li>
                <a href="{{ route('kontak.index') }}"
                    class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-100 hover:text-[#485A10]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 14q.825 0 1.413-.587T14 12t-.587-1.412T12 10t-1.412.588T10 12t.588 1.413T12 14m-4 4h8v-.575q0-.6-.325-1.1t-.9-.75q-.65-.275-1.338-.425T12 15t-1.437.15t-1.338.425q-.575.25-.9.75T8 17.425zm10 4H6q-.825 0-1.412-.587T4 20V4q0-.825.588-1.412T6 2h7.175q.4 0 .763.15t.637.425l4.85 4.85q.275.275.425.638t.15.762V20q0 .825-.587 1.413T18 22" />
                    </svg>
                    <span class="ms-3">Kontak</span>
                </a>
            </li>
            <ul class="mt-4 font-medium border-t border-gray-300 pt-6">
                <li>
                    <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="button" id="logoutBtn"
                            class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-100 hover:text-red-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path d="M5 21q-.825 0-1.412-.587T3 19v-3q0-.425.288-.712T4 15t.713.288T5
                16v3h14V5H5v3q0 .425-.288.713T4 9t-.712-.288T3 8V5q0-.825.588-1.412T5
                3h14q.825 0 1.413.588T21 5v14q0 .825-.587 1.413T19 21zm6.65-8H4q-.425
                0-.712-.288T3 12t.288-.712T4 11h7.65L9.8
                9.15q-.3-.3-.288-.7t.288-.7q.3-.3.713-.312t.712.287L14.8
                11.3q.15.15.213.325t.062.375t-.062.375t-.213.325l-3.575
                3.575q-.3.3-.712.288T9.8 16.25q-.275-.3-.288-.7t.288-.7z" />
                            </svg>
                            <span class="ms-3">Keluar</span>
                        </button>
                    </form>
                </li>
            </ul>
        </ul>
    </div>
</aside>
            <script>
                document.getElementById('logoutBtn').addEventListener('click', function(e) {
                    e.preventDefault();

                    Swal.fire({
                        title: "Yakin ingin keluar?",
                        text: "Kamu akan logout dari akun ini.",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#2563EB",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Ya, keluar!",
                        cancelButtonText: "Batal"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // kirim form logout
                            document.getElementById('logoutForm').submit();
                        }
                    });
                });
            </script>
