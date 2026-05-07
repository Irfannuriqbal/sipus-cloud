<x-app-layout>
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3"><i class="bi bi-file-earmark-check me-2"></i>Pengajuan Saya</h1>
                    <p class="text-muted">Total: {{ $pengajuanSurats->total() }} pengajuan</p>
                </div>
                <a href="{{ route('user.pengajuan.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-1"></i>Ajukan Surat Baru
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                @if($pengajuanSurats->count() > 0)
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Jenis Surat</th>
                                            <th>Keperluan</th>
                                            <th>Status</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pengajuanSurats as $pengajuan)
                                            <tr>
                                                <td>{{ $pengajuanSurats->firstItem() + $loop->index }}</td>
                                                <td>
                                                    <strong>{{ $pengajuan->getJenisSuratLabel() }}</strong>
                                                </td>
                                                <td>
                                                    <small>{{ Str::limit($pengajuan->keperluan, 50) }}</small>
                                                </td>
                                                <td>
                                                    <span class="badge bg-{{ $pengajuan->getStatusBadgeColor() }}">
                                                        {{ ucfirst($pengajuan->status) }}
                                                    </span>
                                                </td>
                                                <td>{{ $pengajuan->created_at->format('d M Y') }}</td>
                                                <td>
                                                    <a href="{{ route('user.pengajuan.show', $pengajuan) }}" class="btn btn-sm btn-primary">
                                                        <i class="bi bi-eye"></i>Lihat
                                                    </a>
                                                    @if($pengajuan->status === 'selesai' && $pengajuan->file_surat)
                                                        <a href="{{ route('user.pengajuan.download', $pengajuan) }}" class="btn btn-sm btn-success">
                                                            <i class="bi bi-download"></i>Download
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <nav aria-label="Page navigation">
                                {{ $pengajuanSurats->links('pagination::bootstrap-5') }}
                            </nav>
                        </div>
                    </div>
                @else
                    <div class="card">
                        <div class="card-body text-center py-5">
                            <i class="bi bi-inbox fs-1 text-muted d-block mb-3"></i>
                            <p class="text-muted mb-3">Anda belum memiliki pengajuan surat</p>
                            <a href="{{ route('user.pengajuan.create') }}" class="btn btn-primary">
                                <i class="bi bi-plus-circle me-1"></i>Ajukan Surat Sekarang
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
