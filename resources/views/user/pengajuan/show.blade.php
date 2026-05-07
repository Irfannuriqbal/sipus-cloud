<x-app-layout>
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3"><i class="bi bi-file-earmark-text me-2"></i>Detail Pengajuan</h1>
                    <p class="text-muted">ID: {{ $pengajuan->id }}</p>
                </div>
                <a href="{{ route('user.pengajuan.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-1"></i>Kembali
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 mb-4">
                <!-- Status -->
                <div class="card mb-3">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="bi bi-clock-history me-2"></i>Status Pengajuan</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <span class="badge bg-{{ $pengajuan->getStatusBadgeColor() }} p-3 fs-5">
                                {{ ucfirst($pengajuan->status) }}
                            </span>
                            <div class="ms-3">
                                <p class="mb-0">
                                    @if($pengajuan->status === 'selesai')
                                        <strong>Pengajuan Anda telah selesai diproses!</strong>
                                        <br><small class="text-muted">Anda dapat mendownload surat melalui tombol di bawah.</small>
                                    @elseif($pengajuan->status === 'diproses')
                                        <strong>Pengajuan Anda sedang diproses</strong>
                                        <br><small class="text-muted">Silakan tunggu, admin sedang memverifikasi dokumen Anda.</small>
                                    @elseif($pengajuan->status === 'ditolak')
                                        <strong>Pengajuan Anda ditolak</strong>
                                        <br><small class="text-muted">Baca catatan admin untuk informasi lebih lanjut.</small>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detail Pengajuan -->
                <div class="card mb-3">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="bi bi-info-circle me-2"></i>Detail Pengajuan</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="text-muted small d-block">Jenis Surat</label>
                                <p class="fw-bold">{{ $pengajuan->getJenisSuratLabel() }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="text-muted small d-block">NIK</label>
                                <p class="fw-bold">{{ $pengajuan->nik }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="text-muted small d-block">Nomor HP</label>
                                <p class="fw-bold">{{ $pengajuan->nomor_hp }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="text-muted small d-block">Tanggal Pengajuan</label>
                                <p class="fw-bold">{{ $pengajuan->created_at->format('d M Y H:i') }}</p>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="text-muted small d-block">Alamat</label>
                                <p class="fw-bold">{{ $pengajuan->alamat }}</p>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="text-muted small d-block">Keperluan</label>
                                <p class="fw-bold">{{ $pengajuan->keperluan }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Dokumen -->
                <div class="card mb-3">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="bi bi-file-pdf me-2"></i>Dokumen yang Diupload</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="text-muted small d-block">File KTP</label>
                                @if($pengajuan->file_ktp)
                                    <div class="btn-group w-100" role="group">
                                        <a href="{{ asset('storage/' . $pengajuan->file_ktp) }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                            <i class="bi bi-eye me-1"></i>Lihat
                                        </a>
                                        <a href="{{ asset('storage/' . $pengajuan->file_ktp) }}" class="btn btn-sm btn-outline-primary" download>
                                            <i class="bi bi-download me-1"></i>Download
                                        </a>
                                    </div>
                                @else
                                    <p class="text-muted">Tidak tersedia</p>
                                @endif
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="text-muted small d-block">File KK</label>
                                @if($pengajuan->file_kk)
                                    <div class="btn-group w-100" role="group">
                                        <a href="{{ asset('storage/' . $pengajuan->file_kk) }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                            <i class="bi bi-eye me-1"></i>Lihat
                                        </a>
                                        <a href="{{ asset('storage/' . $pengajuan->file_kk) }}" class="btn btn-sm btn-outline-primary" download>
                                            <i class="bi bi-download me-1"></i>Download
                                        </a>
                                    </div>
                                @else
                                    <p class="text-muted">Tidak tersedia</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Catatan Admin -->
                @if($pengajuan->catatan_admin)
                    <div class="card">
                        <div class="card-header bg-light">
                            <h5 class="mb-0"><i class="bi bi-chat-left me-2"></i>Catatan dari Admin</h5>
                        </div>
                        <div class="card-body">
                            <p class="mb-0">{{ $pengajuan->catatan_admin }}</p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Right Column -->
            <div class="col-md-4">
                <!-- Download Surat -->
                @if($pengajuan->status === 'selesai' && $pengajuan->file_surat)
                    <div class="card mb-3 sticky-top" style="top: 20px;">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0"><i class="bi bi-download me-2"></i>Unduh Surat</h5>
                        </div>
                        <div class="card-body text-center">
                            <p class="text-muted mb-3">Surat Anda siap untuk diunduh</p>
                            <a href="{{ route('user.pengajuan.download', $pengajuan) }}" class="btn btn-success w-100 btn-lg">
                                <i class="bi bi-file-pdf me-2"></i>Download PDF
                            </a>
                        </div>
                    </div>
                @else
                    <div class="card sticky-top" style="top: 20px;">
                        <div class="card-header bg-light">
                            <h5 class="mb-0"><i class="bi bi-exclamation-circle me-2"></i>Informasi</h5>
                        </div>
                        <div class="card-body">
                            @if($pengajuan->status === 'diproses')
                                <p class="text-muted mb-0">
                                    <i class="bi bi-hourglass-split me-2"></i>
                                    Pengajuan Anda sedang diproses oleh admin. Silakan kembali lagi nanti untuk melihat update status.
                                </p>
                            @elseif($pengajuan->status === 'ditolak')
                                <p class="text-danger mb-0">
                                    <i class="bi bi-x-circle me-2"></i>
                                    Pengajuan Anda telah ditolak. Baca catatan dari admin untuk mengetahui alasannya.
                                </p>
                            @else
                                <p class="text-muted mb-0">
                                    <i class="bi bi-info-circle me-2"></i>
                                    Surat Anda belum tersedia untuk diunduh.
                                </p>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
