<x-app-layout>
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3"><i class="bi bi-file-earmark-text me-2"></i>Detail Pengajuan Surat</h1>
                    <p class="text-muted">ID: {{ $pengajuan->id }}</p>
                </div>
                <div>
                    <a href="{{ route('admin.pengajuan.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-1"></i>Kembali
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Left Column -->
            <div class="col-md-8 mb-4">
                <!-- Data Pemohon -->
                <div class="card mb-3">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="bi bi-person me-2"></i>Data Pemohon</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="text-muted small d-block">Nama Lengkap</label>
                                <p class="fw-bold">{{ $pengajuan->user->name }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="text-muted small d-block">Email</label>
                                <p class="fw-bold">{{ $pengajuan->user->email }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="text-muted small d-block">NIK</label>
                                <p class="fw-bold">{{ $pengajuan->nik }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="text-muted small d-block">Nomor HP</label>
                                <p class="fw-bold">{{ $pengajuan->nomor_hp }}</p>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="text-muted small d-block">Alamat</label>
                                <p class="fw-bold">{{ $pengajuan->alamat }}</p>
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
                                <label class="text-muted small d-block">Status</label>
                                <p>
                                    <span class="badge bg-{{ $pengajuan->getStatusBadgeColor() }} fs-6">
                                        {{ ucfirst($pengajuan->status) }}
                                    </span>
                                </p>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="text-muted small d-block">Keperluan</label>
                                <p class="fw-bold">{{ $pengajuan->keperluan }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="text-muted small d-block">Tanggal Pengajuan</label>
                                <p class="fw-bold">{{ $pengajuan->created_at->format('d M Y H:i') }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="text-muted small d-block">Terakhir Diubah</label>
                                <p class="fw-bold">{{ $pengajuan->updated_at->format('d M Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Document Files -->
                <div class="card mb-3">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="bi bi-file-pdf me-2"></i>Dokumen</h5>
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
                            <h5 class="mb-0"><i class="bi bi-chat me-2"></i>Catatan Admin</h5>
                        </div>
                        <div class="card-body">
                            <p class="mb-0">{{ $pengajuan->catatan_admin }}</p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Right Column - Actions -->
            <div class="col-md-4">
                <div class="card sticky-top" style="top: 20px;">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="bi bi-pencil me-2"></i>Perbarui Status</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.pengajuan.update', $pengajuan) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="">Pilih Status</option>
                                    <option value="diproses" @if($pengajuan->status === 'diproses') selected @endif>Diproses</option>
                                    <option value="ditolak" @if($pengajuan->status === 'ditolak') selected @endif>Ditolak</option>
                                    <option value="selesai" @if($pengajuan->status === 'selesai') selected @endif>Selesai</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="catatan_admin" class="form-label">Catatan</label>
                                <textarea class="form-control" id="catatan_admin" name="catatan_admin" rows="4" placeholder="Masukkan catatan...">{{ $pengajuan->catatan_admin }}</textarea>
                            </div>

                            @if($pengajuan->status !== 'ditolak')
                                <div class="mb-3">
                                    <label for="file_surat" class="form-label">File Surat PDF</label>
                                    <input type="file" class="form-control" id="file_surat" name="file_surat" accept=".pdf">
                                    <small class="text-muted">Format: PDF, Max 5MB</small>
                                </div>
                            @endif

                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-check-circle me-1"></i>Simpan Perubahan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
