<!-- User Sidebar -->
<nav class="sidebar d-flex flex-column p-3 w-250" style="width: 250px;">
    <a href="{{ route('user.dashboard') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none fs-5 fw-bold" style="letter-spacing: 0.5px;">
        <i class="bi bi-file-earmark-check me-2" style="color: var(--corporate-orange);\"></i>
        SIPUS User
    </a>
    <hr style="border-color: rgba(255, 255, 255, 0.1);\">
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('user.dashboard') }}" class="nav-link @if(request()->routeIs('user.dashboard')) active @endif">
                <i class="bi bi-house me-2"></i>
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('user.pengajuan.index') }}" class="nav-link @if(request()->routeIs('user.pengajuan.*')) active @endif">
                <i class="bi bi-file-earmark-check me-2"></i>
                Pengajuan Saya
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('user.pengajuan.create') }}" class="nav-link">
                <i class="bi bi-plus-circle me-2"></i>
                Ajukan Surat
            </a>
        </li>
    </ul>
    <hr class="bg-white-50">
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="mdo" class="rounded-circle me-2" width="32" height="32">
            <span>{{ auth()->user()->name }}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="bi bi-person me-2"></i>Profil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="dropdown-item cursor-pointer"><i class="bi bi-box-arrow-right me-2"></i>Logout</button>
                </form>
            </li>
        </ul>
    </div>
</nav>
