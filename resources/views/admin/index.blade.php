<x-layout>
    <x-slot name="page_name">Halaman Home</x-slot>
    <x-slot name="title"><h6 class="text-info">Halaman Home</h6></x-slot>
    <x-slot name="page_content">
        <h1 class="text-black font-semibold mb-6">Selamat Datang di Dashboard Admin!</h1>

        <!-- Main Content -->
        <div class="flex-1 p-6 space-y-8">
            <!-- Statistik Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Card 1: Total Pengguna -->
                <div class="bg-gradient-to-r from-blue-200 to-blue-400 p-6 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 ease-in-out">
                    <div class="flex items-center space-x-4">
                        <i class="fas fa-users text-white text-4xl"></i>
                        <div>
                            <p class="text-sm text-white opacity-80">Total Pengguna</p>
                            <p class="text-2xl font-semibold text-white">{{ $totalPengguna }}</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Total Penyedia Jasa -->
                <div class="bg-gradient-to-r from-purple-200 to-purple-400 p-6 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 ease-in-out">
                    <div class="flex items-center space-x-4">
                        <i class="fas fa-user-tie text-white text-4xl"></i>
                        <div>
                            <p class="text-sm text-white opacity-80">Total Penyedia Jasa</p>
                            <p class="text-2xl font-semibold text-white">{{ $totalPenyediaJasa }}</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Total Layanan Jasa -->
                <div class="bg-gradient-to-r from-green-200 to-green-400 p-6 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 ease-in-out">
                    <div class="flex items-center space-x-4">
                        <i class="fas fa-clipboard-list text-white text-4xl"></i>
                        <div>
                            <p class="text-sm text-white opacity-80">Total Layanan Jasa</p>
                            <p class="text-2xl font-semibold text-white">{{ $totalLayananJasa }}</p>
                        </div>
                    </div>
                </div>

                <!-- Card 4: Total Pesanan -->
                <div class="bg-gradient-to-r from-yellow-200 to-yellow-400 p-6 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 ease-in-out">
                    <div class="flex items-center space-x-4">
                        <i class="fas fa-envelope text-white text-4xl"></i>
                        <div>
                            <p class="text-sm text-white opacity-80">Total Pesanan</p>
                            <p class="text-2xl font-semibold text-white">{{ $totalPesanan }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistik Pesanan Chart -->
            <div class="bg-white p-8 rounded-xl shadow-xl mt-8">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold text-gray-800">Statistik Pesanan</h2>
                    <form action="{{ route('admin.index') }}" method="GET" class="flex items-center gap-4">
                        <!-- Dropdown Tahun -->
                        <select name="year" class="block bg-gray-100 border border-gray-400 hover:border-gray-500 px-4 py-2 rounded-lg shadow-md text-gray-800">
                            @foreach(range(now()->year, now()->year - 5) as $yearOption)
                                <option value="{{ $yearOption }}" {{ request('year') == $yearOption ? 'selected' : '' }}>{{ $yearOption }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg transition duration-200">Terapkan</button>
                    </form>
                </div>

                <!-- Grafik Statistik Pesanan - Diagram Batang -->
                <div class="flex justify-center">
                    <canvas id="orderChart" class="w-full lg:w-3/4"></canvas>
                </div>
            </div>
        </div>

        <!-- Script Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const monthlyData = @json($monthlyStats);
            const months = monthlyData.map(item => item.month);
            const totals = monthlyData.map(item => item.total);

            const ctx = document.getElementById('orderChart').getContext('2d');
            const orderChart = new Chart(ctx, {
                type: 'bar',  // Mengubah tipe grafik menjadi Bar Chart (Diagram Batang)
                data: {
                    labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
                    datasets: [{
                        label: 'Total Pesanan',
                        data: totals,
                        backgroundColor: 'rgba(56, 189, 248, 0.5)',  // Soft blue fill
                        borderColor: '#38bdf8',  // Soft blue border
                        borderWidth: 2,
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>

    </x-slot>
</x-layout>
