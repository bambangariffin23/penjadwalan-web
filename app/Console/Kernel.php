<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Daftar command Artisan yang disediakan aplikasi.
     */
    protected $commands = [
        //
    ];

    /**
     * Definisikan schedule untuk command aplikasi.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Contoh:
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Daftarkan command untuk Artisan.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
