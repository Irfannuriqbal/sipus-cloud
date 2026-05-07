<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class UserDashboardController extends Controller
{
    /**
     * Display the user dashboard.
     */
    public function index(Request $request): View
    {
        $user = $request->user();
        $totalPengajuan = $user->pengajuanSurats()->count();
        $pengajuanTerakhir = $user->pengajuanSurats()->latest()->first();

        return view('user.dashboard', [
            'totalPengajuan' => $totalPengajuan,
            'pengajuanTerakhir' => $pengajuanTerakhir,
        ]);
    }
}
