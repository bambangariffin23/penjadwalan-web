<div class="sidebar bg-white border-end p-3">
  <ul class="nav flex-column">
    <li class="nav-item mb-2">
        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">🏠 Dashboard</a>
    </li>

    <li class="nav-item mb-2">
        <a href="{{ route('schedules.index') }}" class="nav-link {{ request()->is('schedules*') ? 'active' : '' }}">🗓️ Jadwal Saya</a>
    </li>

    <li class="nav-item mb-2">
        <a href="{{ route('categories.index') }}" class="nav-link {{ request()->is('categories*') ? 'active' : '' }}">🏷️ Kategori</a>
    </li>

    @if(Auth::user() && Auth::user()->role === 'admin')
        <li class="nav-item mb-2">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('admin*') ? 'active' : '' }}">⚙️ Admin Panel</a>
        </li>
    @endif
  </ul>
</div>

<style>
  .sidebar {
    width: 250px;
    min-height: calc(100vh - 120px); /* tinggi dikurangi header + footer */
    position: relative;
    top: 0;
    left: 0;
  }

  .sidebar .nav-link {
    color: #333;
    font-weight: 500;
    padding: 8px 10px;
    border-radius: 5px;
    transition: 0.2s;
  }

  .sidebar .nav-link:hover,
  .sidebar .nav-link.active {
    background-color: #0d6efd;
    color: #fff;
  }
</style>
