<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user(); // ambil user yang login

        // Statistik
        $totalSchedules = Schedule::count();
        $totalUsers = User::count();
        $totalCategories = Category::count();

        // Data untuk chart: jumlah jadwal per kategori
        $chartData = Schedule::select('category_id', DB::raw('count(*) as total'))
            ->groupBy('category_id')
            ->with('category')
            ->get();

        // Data semua jadwal (untuk table + badge + gambar)
        $schedules = Schedule::with('user','category')->get();

         // Untuk Chart.js, kita buat array label & data
        $chartLabels = $chartData->map(fn($c) => $c->category->nama_kategori ?? 'Unknown')->toArray();
        $chartValues = $chartData->pluck('total')->toArray();

        return view('dashboard', compact(
            'user',
            'totalSchedules',
            'totalUsers',
            'totalCategories',
            'chartData',
            'schedules',
             'chartLabels',
            'chartValues'
             
        ));
    }
     public function export()
    {
        return Excel::download(new SchedulesExport, 'jadwal.xlsx');
    }

    // Import jadwal dari Excel/CSV
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        Excel::import(new SchedulesImport, $request->file('file'));

        return redirect()->back()->with('success', 'Jadwal berhasil diimport!');
    }
}
