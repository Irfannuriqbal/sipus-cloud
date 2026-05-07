<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePengajuanSuratRequest;
use App\Http\Requests\UpdatePengajuanSuratRequest;
use App\Models\PengajuanSurat;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengajuanSuratController extends Controller
{
    /**
     * Display a listing of the resource for users.
     */
    public function indexUser(Request $request): View
    {
        $pengajuanSurats = $request->user()->pengajuanSurats()
            ->latest()
            ->paginate(10);

        return view('user.pengajuan.index', [
            'pengajuanSurats' => $pengajuanSurats,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('user.pengajuan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePengajuanSuratRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // Upload file ke S3
        if ($request->hasFile('file_ktp')) {
            $validated['file_ktp'] = $request->file('file_ktp')
                ->store('pengajuan/ktp', 's3');
        }

        if ($request->hasFile('file_kk')) {
            $validated['file_kk'] = $request->file('file_kk')
                ->store('pengajuan/kk', 's3');
        }

        $validated['user_id'] = $request->user()->id;

        PengajuanSurat::create($validated);

        return redirect()->route('user.pengajuan.index')
            ->with('success', 'Pengajuan surat berhasil dibuat. Silakan tunggu persetujuan admin.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PengajuanSurat $pengajuanSurat): View
    {
        $this->authorizeUserAccess($pengajuanSurat);

        return view('user.pengajuan.show', [
            'pengajuan' => $pengajuanSurat,
        ]);
    }

    /**
     * Show the form for editing the specified resource (admin only).
     */
    public function edit(PengajuanSurat $pengajuanSurat): View
    {
        return view('admin.pengajuan.edit', [
            'pengajuan' => $pengajuanSurat,
        ]);
    }

    /**
     * Update the specified resource in storage (admin only).
     */
    public function update(UpdatePengajuanSuratRequest $request, PengajuanSurat $pengajuanSurat): RedirectResponse
    {
        $validated = $request->validated();

        // Upload file surat ke S3
        if ($request->hasFile('file_surat')) {

            // Hapus file lama
            if ($pengajuanSurat->file_surat) {
                Storage::disk('s3')->delete($pengajuanSurat->file_surat);
            }

            $validated['file_surat'] = $request->file('file_surat')
                ->store('pengajuan/surat', 's3');
        }

        $pengajuanSurat->update($validated);

        return redirect()->route('admin.pengajuan.show', $pengajuanSurat)
            ->with('success', 'Pengajuan surat berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage (admin only).
     */
    public function destroy(PengajuanSurat $pengajuanSurat): RedirectResponse
    {
        // Hapus file di S3
        if ($pengajuanSurat->file_ktp) {
            Storage::disk('s3')->delete($pengajuanSurat->file_ktp);
        }

        if ($pengajuanSurat->file_kk) {
            Storage::disk('s3')->delete($pengajuanSurat->file_kk);
        }

        if ($pengajuanSurat->file_surat) {
            Storage::disk('s3')->delete($pengajuanSurat->file_surat);
        }

        $pengajuanSurat->delete();

        return redirect()->route('admin.pengajuan.index')
            ->with('success', 'Pengajuan surat berhasil dihapus.');
    }

    /**
     * Display all pengajuan surats for admin.
     */
    public function indexAdmin(Request $request): View
    {
        $pengajuanSurats = PengajuanSurat::with('user')
            ->latest()
            ->paginate(15);

        return view('admin.pengajuan.index', [
            'pengajuanSurats' => $pengajuanSurats,
        ]);
    }

    /**
     * Show pengajuan surat for admin.
     */
    public function showAdmin(PengajuanSurat $pengajuanSurat): View
    {
        return view('admin.pengajuan.show', [
            'pengajuan' => $pengajuanSurat,
        ]);
    }

    /**
     * Authorize user access to their own pengajuan surat.
     */
    private function authorizeUserAccess(PengajuanSurat $pengajuanSurat): void
    {
        if (Auth::id() !== $pengajuanSurat->user_id) {
            abort(403, 'Anda tidak memiliki akses ke pengajuan ini.');
        }
    }

    /**
     * Download surat PDF.
     */
    public function downloadSurat(PengajuanSurat $pengajuanSurat)
    {
        if (!$pengajuanSurat->file_surat) {
            return redirect()->back()
                ->with('error', 'File surat belum tersedia.');
        }

        $this->authorizeUserAccess($pengajuanSurat);

        $disk = Storage::disk('s3');

        return $disk->download($pengajuanSurat->file_surat);
    }
}
