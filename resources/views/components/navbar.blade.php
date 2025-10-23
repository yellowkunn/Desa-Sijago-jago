<nav class="bg-white w-full z-20 top-0 start-0 border-b border-gray-200">
  <div class="max-w-7xl mx-auto flex items-center justify-between p-2 lg:p-4 relative">
    
    <!-- Menu (Desktop) -->
    <div class="hidden md:flex w-full justify-center">
      <ul class="flex space-x-8 text-base font-medium">
        <li><a href="{{ route('dashboard') }}" class="block py-2 px-2 text-black hover:text-[#485A10]">Home</a></li>
        <li><a href="{{ route('tentang.kami') }}" class="block py-2 px-2 text-black hover:text-[#485A10]">Tentang Kami</a></li>
        <li><a href="{{ route('destinasi.wisata') }}" class="block py-2 px-2 text-black hover:text-[#485A10]">Destinasi Wisata</a></li>
        <li><a href="{{ route('produk.desa') }}" class="block py-2 px-2 text-black hover:text-[#485A10]">Produk Desa</a></li>
        <li><a href="{{ route('paket.wisata') }}" class="block py-2 px-2 text-black hover:text-[#485A10]">Paket Wisata</a></li>
        <li><a href="{{ route('peta') }}" class="block py-2 px-2 text-black hover:text-[#485A10]">Peta</a></li>
        <li><a href="{{ route('kontak') }}" class="block py-2 px-2 text-black hover:text-[#485A10]">Kontak</a></li>
      </ul>
    </div>

    <!-- Hamburger (Mobile) -->
    <div class="md:hidden ml-auto">
      <button data-collapse-toggle="navbar-sticky" type="button" 
        class="inline-flex items-center w-10 h-10 justify-center text-sm text-gray-500 
               rounded-lg focus:outline-none focus:ring-2 
               focus:ring-gray-200" 
        aria-controls="navbar-sticky" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" 
          fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" 
            stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
      </button>
    </div>
  </div>

  <!-- Menu (Mobile Dropdown) -->
  <div id="navbar-sticky" class="hidden md:hidden w-full">
    <ul class="flex flex-col items-center p-2 gap-3 text-sm font-medium 
               border border-gray-100 rounded-lg">
      <li><a href="{{ route('dashboard') }}" class="block py-2 px-2 text-black hover:text-[#485A10]">Home</a></li>
      <li><a href="{{ route('tentang.kami') }}" class="block py-2 px-2 text-black hover:text-[#485A10]">Tentang Kami</a></li>
      <li><a href="{{ route('destinasi.wisata') }}" class="block py-2 px-2 text-black hover:text-[#485A10]">Destinasi Wisata</a></li>
      <li><a href="{{ route('produk.desa') }}" class="block py-2 px-2 text-black hover:text-[#485A10]">Produk Desa</a></li>
      <li><a href="{{ route('paket.wisata') }}" class="block py-2 px-2 text-black hover:text-[#485A10]">Paket Wisata</a></li>
      <li><a href="{{ route('peta') }}" class="block py-2 px-2 text-black hover:text-[#485A10]">Peta</a></li>
      <li><a href="{{ route('kontak') }}" class="block py-2 px-2 text-black hover:text-[#485A10]">Kontak</a></li>
    </ul>
  </div>
</nav>
