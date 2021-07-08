<?php

namespace App\Console\Commands;

use App\Mail\CalendarReminderMail;
use App\Models\CalendarReminder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class CalendarReminderEveryMinute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CalendarReminder:EveryMinute';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calendar Reminder Control Every Minute';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return 0;
    }
}
