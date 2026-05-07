<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PengajuanSurat;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index(): View
    {
        $totalUsers = User::where('role', 'user')->count();
        $totalPengajuan = PengajuanSurat::count();
        $totalSelesai = PengajuanSurat::where('status', 'selesai')->count();
        $totalDiproses = PengajuanSurat::where('status', 'diproses')->count();
        $totalDitolak = PengajuanSurat::where('status', 'ditolak')->count();

        return view('admin.dashboard', [
            'totalUsers' => $totalUsers,
            'totalPengajuan' => $totalPengajuan,
            'totalSelesai' => $totalSelesai,
            'totalDiproses' => $totalDiproses,
            'totalDitolak' => $totalDitolak,
        ]);
    }
}
