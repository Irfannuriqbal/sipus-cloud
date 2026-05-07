<x-app-layout>
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="h3" style="color: var(--corporate-navy); font-weight: 700;"><i class="bi bi-house me-2" style="color: var(--corporate-teal);\"></i>Dashboard</h1>
                <p class="text-muted">Kelola pengajuan surat Anda</p>
            </div>
        </div>

        <!-- Statistics -->
        <div class="row mb-4">
            <div class="col-md-6 mb-3">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="card-title mb-0 text-muted">Total Pengajuan</h6>
                                <h2 class="mb-0 fw-bold" style="color: var(--corporate-teal);\">{{ $totalPengajuan }}</h2>
                            </div>
                            <div class="ms-auto">
                                <i class="bi bi-file-earmark-text fs-1" style="color: var(--corporate-teal); opacity: 0.2;\"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="card-title mb-0 text-muted">Status Terakhir</h6>
                                @if($pengajuanTerakhir)
                                    <h5 class="mb-0">
                                        <span class="badge bg-{{ $pengajuanTerakhir->getStatusBadgeColor() }}">
                                            {{ ucfirst($pengajuanTerakhir->status) }}
                                        </span>
                                    </h5>
                                @else
                                    <p class="mb-0 text-muted">Belum ada pengajuan</p>
                                @endif
                            </div>
                            <div class="ms-auto">
                                <i class="bi bi-info-circle fs-1" style="color: var(--corporate-orange); opacity: 0.2;\"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="border-bottom: 2px solid var(--corporate-teal);\">
                        <h5 class="mb-0"><i class="bi bi-lightning-charge me-2" style="color: var(--corporate-orange);\"></i>Aksi Cepat</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <a href="{{ route('user.pengajuan.index') }}" class="btn w-100" style="background-color: var(--corporate-teal); color: white; font-weight: 600;">
                                    <i class="bi bi-list me-2"></i>Lihat Pengajuan Saya
                                </a>
                            </div>
                            <div class="col-md-6 mb-2">
                                <a href="{{ route('user.pengajuan.create') }}" class="btn w-100" style="background-color: var(--corporate-orange); color: white; font-weight: 600;">
                                    <i class="bi bi-plus-circle me-2"></i>Ajukan Surat Baru
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Last Submission -->
        @if($pengajuanTerakhir)
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="border-bottom: 2px solid var(--corporate-teal);\">
                            <h5 class="mb-0">Pengajuan Terakhir</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="text-muted mb-1">Jenis Surat</p>
                                    <p class="fw-bold">{{ $pengajuanTerakhir->getJenisSuratLabel() }}</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="text-muted mb-1">Status</p>
                                    <p>
                                        <span class="badge bg-{{ $pengajuanTerakhir->getStatusBadgeColor() }} fs-6">
                                            {{ ucfirst($pengajuanTerakhir->status) }}
                                        </span>
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p class="text-muted mb-1">Tanggal Pengajuan</p>
                                    <p class="fw-bold">{{ $pengajuanTerakhir->created_at->format('d M Y') }}</p>
                                </div>
                            </div>
                            <div class="mt-3">
                                <a href="{{ route('user.pengajuan.show', $pengajuanTerakhir) }}" class="btn btn-sm" style="background-color: var(--corporate-teal); color: white; font-weight: 600;">
                                    <i class="bi bi-eye me-1"></i>Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
