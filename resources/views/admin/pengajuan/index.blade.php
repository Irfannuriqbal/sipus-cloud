<x-app-layout>
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="h3"><i class="bi bi-file-earmark-text me-2"></i>Kelola Pengajuan Surat</h1>
                <p class="text-muted">Total: {{ $pengajuanSurats->total() }} pengajuan</p>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Daftar Pengajuan</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Pemohon</th>
                                        <th>Jenis Surat</th>
                                        <th>NIK</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($pengajuanSurats as $pengajuan)
                                        <tr>
                                            <td>{{ $pengajuanSurats->firstItem() + $loop->index }}</td>
                                            <td>
                                                <strong>{{ $pengajuan->user->name }}</strong><br>
                                                <small class="text-muted">{{ $pengajuan->user->email }}</small>
                                            </td>
                                            <td>{{ $pengajuan->getJenisSuratLabel() }}</td>
                                            <td>{{ $pengajuan->nik }}</td>
                                            <td>
                                                <span class="badge bg-{{ $pengajuan->getStatusBadgeColor() }}">
                                                    {{ ucfirst($pengajuan->status) }}
                                                </span>
                                            </td>
                                            <td>{{ $pengajuan->created_at->format('d M Y H:i') }}</td>
                                            <td>
                                                <a href="{{ route('admin.pengajuan.show', $pengajuan) }}" class="btn btn-sm btn-info">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.pengajuan.edit', $pengajuan) }}" class="btn btn-sm btn-warning">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <button class="btn btn-sm btn-danger" onclick="confirmDelete({{ $pengajuan->id }})">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                                <form id="delete-form-{{ $pengajuan->id }}" action="{{ route('admin.pengajuan.destroy', $pengajuan) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center py-4 text-muted">
                                                <i class="bi bi-inbox fs-3"></i><br>
                                                Tidak ada pengajuan
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <nav aria-label="Page navigation">
                            {{ $pengajuanSurats->links('pagination::bootstrap-5') }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            if (confirm('Apakah Anda yakin ingin menghapus pengajuan ini?')) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>
</x-app-layout>
