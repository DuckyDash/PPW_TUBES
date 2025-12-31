<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Notification;
use Carbon\Carbon;

class CleanOldNotifications extends Command
{
    protected $signature = 'notifications:clean';
    protected $description = 'Hapus notifikasi lama';

    public function handle()
    {
        $days = 7; 

        $deleted = Notification::where('created_at', '<', Carbon::now()->subDays($days))
            ->delete();

        $this->info("{$deleted} notifikasi lama dihapus.");
    }
}
