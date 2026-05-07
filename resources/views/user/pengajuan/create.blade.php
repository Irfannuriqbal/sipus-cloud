<x-app-layout>
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="h3"><i class="bi bi-plus-circle me-2"></i>Ajukan Surat Baru</h1>
                <p class="text-muted">Lengkapi form di bawah untuk mengajukan surat</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Form Pengajuan Surat</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.pengajuan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Jenis Surat -->
                            <div class="mb-4">
                                <label for="jenis_surat" class="form-label fw-bold">Jenis Surat *</label>
                                <select class="form-select @error('jenis_surat') is-invalid @enderror" id="jenis_surat" name="jenis_surat" required>
                                    <option value="">-- Pilih Jenis Surat --</option>
                                    <option value="domisili" @if(old('jenis_surat') === 'domisili') selected @endif>Surat Domisili</option>
                                    <option value="usaha" @if(old('jenis_surat') === 'usaha') selected @endif>Surat Usaha</option>
                                    <option value="pengantar" @if(old('jenis_surat') === 'pengantar') selected @endif>Surat Pengantar</option>
                                    <option value="tidak_mampu" @if(old('jenis_surat') === 'tidak_mampu') selected @endif>Surat Tidak Mampu</option>
                                </select>
                                @error('jenis_surat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <!-- Nama Lengkap -->
                                <div class="col-md-6 mb-4">
                                    <label for="name" class="form-label fw-bold">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="name" value="{{ auth()->user()->name }}" disabled>
                                    <small class="text-muted">Dari profil Anda</small>
                                </div>

                                <!-- NIK -->
                                <div class="col-md-6 mb-4">
                                    <label for="nik" class="form-label fw-bold">NIK *</label>
                                    <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik') }}" placeholder="Masukkan 16 digit NIK" required>
                                    @error('nik')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Alamat -->
                            <div class="mb-4">
                                <label for="alamat" class="form-label fw-bold">Alamat *</label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap" required>{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Nomor HP -->
                            <div class="mb-4">
                                <label for="nomor_hp" class="form-label fw-bold">Nomor HP *</label>
                                <input type="text" class="form-control @error('nomor_hp') is-invalid @enderror" id="nomor_hp" name="nomor_hp" value="{{ old('nomor_hp') }}" placeholder="Contoh: 08xxxxxxxxxx" required>
                                @error('nomor_hp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Keperluan -->
                            <div class="mb-4">
                                <label for="keperluan" class="form-label fw-bold">Keperluan *</label>
                                <textarea class="form-control @error('keperluan') is-invalid @enderror" id="keperluan" name="keperluan" rows="4" placeholder="Jelaskan keperluan Anda..." required>{{ old('keperluan') }}</textarea>
                                @error('keperluan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- File KTP -->
                            <div class="mb-4">
                                <label for="file_ktp" class="form-label fw-bold">Upload File KTP *</label>
                                <div class="input-group">
                                    <input type="file" class="form-control @error('file_ktp') is-invalid @enderror" id="file_ktp" name="file_ktp" accept=".pdf,.jpg,.jpeg,.png" required>
                                    <span class="input-group-text">
                                        <i class="bi bi-paperclip"></i>
                                    </span>
                                </div>
                                <small class="text-muted d-block mt-2">Format: PDF, JPG, JPEG, PNG | Max 2MB</small>
                                @error('file_ktp')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- File KK -->
                            <div class="mb-4">
                                <label for="file_kk" class="form-label fw-bold">Upload File KK *</label>
                                <div class="input-group">
                                    <input type="file" class="form-control @error('file_kk') is-invalid @enderror" id="file_kk" name="file_kk" accept=".pdf,.jpg,.jpeg,.png" required>
                                    <span class="input-group-text">
                                        <i class="bi bi-paperclip"></i>
                                    </span>
                                </div>
                                <small class="text-muted d-block mt-2">Format: PDF, JPG, JPEG, PNG | Max 2MB</small>
                                @error('file_kk')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="alert alert-info" role="alert">
                                <i class="bi bi-info-circle me-2"></i>
                                <strong>Perhatian:</strong> Pastikan semua data yang Anda masukkan sudah benar, karena admin akan memverifikasi dokumen Anda.
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle me-1"></i>Ajukan
                                </button>
                                <a href="{{ route('user.pengajuan.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left me-1"></i>Batal
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
