<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Soban</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{ asset('asset/css/styles.css') }}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
{{-- Header --}}
@include('layouts.header')

  <!-- Hero Section -->
  <section class="bg-[#27547D] py-2">
      <h2 class="text-4xl text-center font-bold mb-3 text-white">Layanan Jasa</h2>
  </section>
  <section class="container mx-auto max-w-6xl py-8">
    <div class="flex items-center gap-4 mb-8">
      <!-- Search Bar -->
      <div class="flex flex-1 items-center bg-white border-2 border-[#74767E] shadow-md rounded-md p-2">
        <input type="text" placeholder="Search here..." class="w-full border-0 focus:ring-0 focus:outline-none text-sm">
      </div>
      <!-- Dropdown Filter -->
      <div class="relative">
        <!-- Button with Filter Icon -->
        <button id="filterButton" class="bg-white border-2 border-[#74767E] text-gray-700 py-2 px-3 rounded-md shadow flex items-center space-x-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 01.8 1.6l-3.6 4.8a1 1 0 01-.8.4H7a1 1 0 01-.8-.4L2.6 6.6A1 1 0 013 5z" clip-rule="evenodd" />
          </svg>
          <span class="text-sm">Filter</span>
        </button>

        <!-- Dropdown Menu -->
        <div id="filterDropdown" class="hidden absolute mt-2 w-48 bg-white border border-gray-300 rounded-md shadow-lg">
          <ul class="py-2 text-sm text-gray-700">
            <li>
              <button class="w-full text-left px-4 py-2 hover:bg-gray-100 focus:outline-none">
                <span class="flex items-center space-x-2">
                  <span class="text-gray-600">🏠</span>
                  <span>Rumah</span>
                </span>
              </button>
            </li>
            <li>
              <button class="w-full text-left px-4 py-2 hover:bg-gray-100 focus:outline-none">
                <span class="flex items-center space-x-2">
                  <span class="text-gray-600">🚗</span>
                  <span>Kendaraan</span>
                </span>
              </button>
            </li>
            <li>
              <button class="w-full text-left px-4 py-2 hover:bg-gray-100 focus:outline-none">
                <span class="flex items-center space-x-2">
                  <span class="text-gray-600">🐾</span>
                  <span>Hewan</span>
                </span>
              </button>
            </li>
          </ul>
        </div>
      </div>

      <script>
        // Toggle dropdown menu
        const filterButton = document.getElementById('filterButton');
        const filterDropdown = document.getElementById('filterDropdown');

        filterButton.addEventListener('click', () => {
          filterDropdown.classList.toggle('hidden');
        });
        // Close dropdown when clicking outside
        window.addEventListener('click', (e) => {
          if (!filterButton.contains(e.target) && !filterDropdown.contains(e.target)) {
            filterDropdown.classList.add('hidden');
          }
        });
      </script>
    </div>
  </section>

  <!-- Services -->
  <section>
    <div class="container mx-auto max-w-6xl py-8">
      <div id="layanan-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Service Card -->
        @foreach ($layanan as $index => $layanan)
          <div class="bg-white rounded-xl shadow-2xl p-4 {{ $index >= 8 ? 'hidden' : '' }}" id="layanan-card-{{ $index }}">
            <img
              src="{{ asset('asset/img/' . ($layanan->gambar ? $layanan->gambar : 'default-image.jpg')) }}"
              alt="Service"
              class="w-24 h-24 object-cover mx-auto mb-4 rounded-full">
            <h3 class="text-center font-semibold text-lg mb-2">{{ $layanan->namaJasa }}</h3>
            <div class="flex items-center justify-center space-x-2 mb-2">
              <!-- Display Harga -->
              <span class="text-base text-black-300">Rp {{ number_format($layanan->harga, 0, ',', '.') }}</span>
            </div>
            <!-- Order Button -->
            <div class="text-end">
              <a href="{{ route('layanan.show', $layanan->id) }}">
                <button class="bg-amber-500 text-white px-3 py-1 rounded-md hover:bg-blue-700">Lihat</button>
              </a>
              <a href="{{ route('form_pemesanan', ['layanan_id' => $layanan->id]) }}">
                <button class="bg-blue-600 text-white px-3 py-1 rounded-md hover:bg-blue-700">Pesan</button>
              </a>
            </div>
          </div>
        @endforeach
      </div>

      <!-- Buttons for showing and hiding cards -->
      <div class="flex justify-center mt-8 space-x-4">
        <button id="load-more" class="bg-[#27547D] text-white text-lg px-6 py-3 rounded-lg hover:bg-blue-700 transition flex items-center space-x-2">
          <span>Lihat Selengkapnya</span>
          <i class="fa-solid fa-arrow-right"></i>
        </button>
        <button id="back-to-top" class="bg-[#27547D] text-white text-lg px-6 py-3 rounded-lg hover:bg-blue-700 transition flex items-center space-x-2 hidden">
          <i class="fa-solid fa-arrow-left"></i>
          <span>Tutup</span>
        </button>
      </div>
    </div>
  </section>
  <script>
    document.getElementById('load-more').addEventListener('click', function() {
      const hiddenCards = document.querySelectorAll('#layanan-container .hidden');

      hiddenCards.forEach(function(card) {
        card.classList.remove('hidden');
      });

      this.style.display = 'none';

      document.getElementById('back-to-top').classList.remove('hidden');
    });

    document.getElementById('back-to-top').addEventListener('click', function() {
      const revealedCards = document.querySelectorAll('#layanan-container .bg-white');

      revealedCards.forEach(function(card, index) {
        if (index >= 8) {
          card.classList.add('hidden');
        }
      });

      document.getElementById('load-more').style.display = 'inline-block';

      this.classList.add('hidden');
    });
  </script>





  <!-- Footer -->
  @include('layouts.footer')


  <script src="{{ asset('asset/js/script.js') }}"></script>
</body>
</html>