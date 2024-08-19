<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Booking;
use App\Notifications\TaskDeadlineNotification;
use Carbon\Carbon;

class SendDeadlineNotifications extends Command
{
    protected $signature = 'send:deadline-notifications';
    protected $description = 'Mengirim notifikasi email untuk tugas yang mendekati tenggat waktu';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $tasks = Booking::where('return_date', '>', now())
            ->where('return_date', '<', now()->addDays(1))
            ->with('User')
            ->get();

        foreach ($tasks as $task) {
            $task->User->notify(new TaskDeadlineNotification($task));
        }

        $this->info('Notifikasi tenggat waktu telah dikirim.');
    }
}
