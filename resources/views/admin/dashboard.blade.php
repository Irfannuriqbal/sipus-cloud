<x-app-layout>
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="h3" style="color: var(--corporate-navy); font-weight: 700;"><i class="bi bi-graph-up me-2" style="color: var(--corporate-teal);\"></i>Dashboard Admin</h1>
                <p class="text-muted">Selamat datang di panel administrasi SIPUS</p>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="card-title mb-0 text-muted">Total User</h6>
                                <h2 class="mb-0 fw-bold" style="color: var(--corporate-teal);\">{{ $totalUsers }}</h2>
                            </div>
                            <div class="ms-auto">
                                <i class="bi bi-people-fill fs-1" style="color: var(--corporate-teal); opacity: 0.2;\"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="card-title mb-0 text-muted">Total Pengajuan</h6>
                                <h2 class="mb-0 fw-bold" style="color: var(--corporate-orange);\">{{ $totalPengajuan }}</h2>
                            </div>
                            <div class="ms-auto">
                                <i class="bi bi-file-earmark-text fs-1" style="color: var(--corporate-orange); opacity: 0.2;\"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="card-title mb-0 text-muted">Diproses</h6>
                                <h2 class="mb-0 fw-bold" style="color: #ffc107;\">{{ $totalDiproses }}</h2>
                            </div>
                            <div class="ms-auto">
                                <i class="bi bi-hourglass-split fs-1" style="color: #ffc107; opacity: 0.2;\"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="card-title mb-0 text-muted">Selesai</h6>
                                <h2 class="mb-0 fw-bold" style="color: #28a745;\">{{ $totalSelesai }}</h2>
                            </div>
                            <div class="ms-auto">
                                <i class="bi bi-check-circle-fill fs-1" style="color: #28a745; opacity: 0.2;\"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="card-title mb-0 text-muted">Ditolak</h6>
                                <h2 class="mb-0 fw-bold" style="color: #dc3545;\">{{ $totalDitolak }}</h2>
                            </div>
                            <div class="ms-auto">
                                <i class="bi bi-x-circle-fill fs-1" style="color: #dc3545; opacity: 0.2;\"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="border-bottom: 2px solid var(--corporate-teal);\">
                        <h5 class="mb-0"><i class="bi bi-lightning-charge me-2" style="color: var(--corporate-orange);\"></i>Akses Cepat</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <a href="{{ route('admin.pengajuan.index') }}" class="btn w-100" style="background-color: var(--corporate-teal); color: white; font-weight: 600;">
                                    <i class="bi bi-list me-2"></i>Lihat Semua Pengajuan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
