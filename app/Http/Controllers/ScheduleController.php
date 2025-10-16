<?php
namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class ScheduleController extends Controller

{
    public function index()
{
   $schedules = Schedule::with(['user', 'category'])->get();
  
    return view('schedules.index', compact('schedules')); // kirim ke view
}
    public function create()
    {
        $users = User::all();
        $categories = Category::all();
        return view('schedules.create', compact('users', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tanggal' => 'required|date',
            'waktu' => 'required',
        ]);

        Schedule::create($request->all());

        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function updateStatus(Request $request, Schedule $schedule)
{
    $request->validate([
        'status' => 'required|in:pending,selesai,dibatalkan',
    ]);

    $schedule->update([
        'status' => $request->status
    ]);

    return redirect()->back()->with('success', 'Status jadwal berhasil diubah!');
}

    public function edit(Schedule $schedule)
    {
        $users = User::all();
        $categories = Category::all();
        return view('schedules.edit', compact('schedule', 'users', 'categories'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $schedule->update($request->all());
        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
