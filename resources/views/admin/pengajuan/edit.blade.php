<x-app-layout>
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="h3"><i class="bi bi-pencil me-2"></i>Edit Pengajuan Surat</h1>
                <p class="text-muted">Update status dan dokumen pengajuan</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">{{ $pengajuan->user->name }} - {{ $pengajuan->getJenisSuratLabel() }}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.pengajuan.update', $pengajuan) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="mb-4">
                                <label for="status" class="form-label fw-bold">Status Pengajuan *</label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="diproses" @if($pengajuan->status === 'diproses') selected @endif>Diproses</option>
                                    <option value="ditolak" @if($pengajuan->status === 'ditolak') selected @endif>Ditolak</option>
                                    <option value="selesai" @if($pengajuan->status === 'selesai') selected @endif>Selesai</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="catatan_admin" class="form-label fw-bold">Catatan Admin</label>
                                <textarea class="form-control @error('catatan_admin') is-invalid @enderror" id="catatan_admin" name="catatan_admin" rows="5" placeholder="Masukkan catatan atau alasan penolakan...">{{ $pengajuan->catatan_admin }}</textarea>
                                <small class="text-muted">Max 500 karakter</small>
                                @error('catatan_admin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="alert alert-info" role="alert">
                                <i class="bi bi-info-circle me-2"></i>
                                <strong>Catatan:</strong> Upload file surat hanya diperlukan jika status diubah menjadi "Selesai"
                            </div>

                            <div class="mb-4">
                                <label for="file_surat" class="form-label fw-bold">Upload File Surat PDF (Opsional)</label>
                                <input type="file" class="form-control @error('file_surat') is-invalid @enderror" id="file_surat" name="file_surat" accept=".pdf">
                                <small class="text-muted d-block mt-2">Format: PDF saja | Max 5MB</small>
                                @if($pengajuan->file_surat)
                                    <div class="mt-2">
                                        <small class="text-success"><i class="bi bi-check-circle me-1"></i>File saat ini tersedia</small>
                                    </div>
                                @endif
                                @error('file_surat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle me-1"></i>Simpan Perubahan
                                </button>
                                <a href="{{ route('admin.pengajuan.show', $pengajuan) }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left me-1"></i>Kembali
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
