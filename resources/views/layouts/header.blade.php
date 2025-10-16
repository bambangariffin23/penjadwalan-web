<header class="d-flex justify-content-between align-items-center border-bottom px-4 py-2 bg-white shadow-sm">
    <div class="d-flex align-items-center">
        <img src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg"
             alt="Logo"
             width="30"
             height="30"
             class="me-2">
        <h5 class="mb-0 fw-semibold text-primary">Sistem Penjadwalan Harian</h5>
    </div>

    <div>
       <form action="{{ route('logout') }}" method="POST" style="display:inline;">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form>

    </div>
</header>
