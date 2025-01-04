<x-layout>
    <x-slot name="page_name">Halaman Home Penyedia Jasa</x-slot>
    <x-slot name="title"><h6 class="text-info">Dashboard Penyedia Jasa</h6></x-slot>
    <x-slot name="page_content">
        <h1 class="text-black font-semibold mb-6">Selamat Datang di Dashboard Penyedia Jasa!</h1>
        
        <!-- Statistik Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card 1: Total Layanan Jasa -->
            <div class="bg-gradient-to-r from-blue-200 to-blue-400 p-6 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 ease-in-out">
                <p class="text-sm text-white opacity-80">Total Layanan Jasa</p>
                <p class="text-2xl font-semibold text-white">{{ $totalLayananJasa }}</p>
            </div>

            <!-- Card 2: Total Pesanan -->
            <div class="bg-gradient-to-r from-green-200 to-green-400 p-6 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 ease-in-out">
                <p class="text-sm text-white opacity-80">Total Pesanan</p>
                <p class="text-2xl font-semibold text-white">{{ $totalPesanan }}</p>
            </div>

            <!-- Card 3: Total Layanan Selesai -->
            <div class="bg-gradient-to-r from-yellow-200 to-yellow-400 p-6 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 ease-in-out">
                <p class="text-sm text-white opacity-80">Total Layanan Selesai</p>
                <p class="text-2xl font-semibold text-white">{{ $totalLayananSelesai }}</p>
            </div>
        </div>

        <!-- Daftar Pesanan Terkini -->
        <div class="mt-8">
            <h2 class="text-xl font-semibold text-gray-800">Pesanan Terkini</h2>
            <table class="min-w-full mt-4 bg-white shadow rounded-lg">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">No.</th>
                        <th class="px-4 py-2">Nama Pengguna</th>
                        <th class="px-4 py-2">Layanan</th>
                        <th class="px-4 py-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pesananTerkini as $pesanan)
                        <tr>
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $pesanan->user->name }}</td>
                            <td class="px-4 py-2">{{ $pesanan->layananJasa->namaJasa }}</td>
                            <td class="px-4 py-2">{{ $pesanan->status_pesanan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Grafik Statistik -->
        <div class="bg-white p-8 rounded-xl shadow-xl mt-8">
            <canvas id="orderChart" class="w-full"></canvas>
        </div>
        
        <!-- Script Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const monthlyData = @json($monthlyStats);
            const months = monthlyData.map(item => item.month);
            const totals = monthlyData.map(item => item.total);

            new Chart(document.getElementById('orderChart'), {
                type: 'bar',
                data: {
                    labels: months,
                    datasets: [{
                        label: 'Total Pesanan',
                        data: totals,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                    }]
                },
                options: {
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        </script>
    </x-slot>
</x-layout>
