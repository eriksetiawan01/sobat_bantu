<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">

      <!-- Dashboard (semua role dapat mengakses) -->
      <li class="nav-item">
        <a class="nav-link " href="{{ Auth::user()->role === 'admin' ? route('admin.index') : route('penyediajasa.index') }}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>
    </li><!-- End Dashboard Nav -->    

      <!-- Data Tables (Hanya Admin yang bisa mengakses) -->
      @if(Auth::user()->role === 'admin')
      <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-layout-text-window-reverse"></i><span>Data Tables</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="tables-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
              <li><a href="/dashboard/pengguna"><i class="bi bi-people fs-6"></i><span>Data Pengguna</span></a></li>
              <li><a href="/dashboard/penyediajasa"><i class="bi bi-briefcase fs-6"></i><span>Data Penyedia Jasa</span></a></li>
              <li><a href="/dashboard/kategori"><i class="bi bi-tags fs-6"></i><span>Data Kategori</span></a></li>
              <li><a href="/dashboard/layananjasa"><i class="bi bi-box fs-6"></i><span>Data Layanan Jasa</span></a></li>
              <li><a href="{{ route('admin.pesanan') }}"><i class="bi bi-receipt fs-6"></i><span>Data Pesanan</span></a></li>
          </ul>
      </li><!-- End Tables Nav -->
      @endif
      @if(Auth::user()->role === 'penyedia_jasa')
      <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-layout-text-window-reverse"></i><span>Data Tables</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="tables-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
              <li><a href="{{ route('penyediajasa.layananjasa.index', ['penyediaId' => Auth::id()]) }}"><i class="bi bi-box fs-6"></i><span>Data Layanan Jasa</span></a></li>
              <li><a href="{{ route('penyediajasa.pesanan.index', ['penyediaId' => Auth::id()]) }}"><i class="bi bi-receipt fs-6"></i><span>Data Pesanan</span></a></li>
              <li><a href="{{ route('penyediajasa.jenispembayaran.index', ['penyediaId' => Auth::id()]) }}"><i class="bi bi-cash fs-6"></i><span>Data Jenis Pembayaran</span></a></li>

          </ul>
      </li><!-- End Tables Nav -->
      @endif

      <!-- Data Layanan Jasa dan Pesanan (Hanya Penyedia Jasa yang bisa mengakses) -->
      {{-- @if(Auth::user()->role === 'penyedia_jasa')
      <li class="nav-item">
          <a class="nav-link collapsed" href="/dashboard/layananjasa">
              <i class="bi bi-box fs-6"></i><span>Data Layanan Jasa</span>
          </a>
      </li><!-- End Data Layanan Jasa Nav -->

      <li class="nav-item">
          <a class="nav-link collapsed" href="tables-data.html">
              <i class="bi bi-receipt fs-6"></i><span>Data Pesanan</span>
          </a>
      </li><!-- End Data Pesanan Nav -->
      @endif --}}

  </ul>
</aside>
