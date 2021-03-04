<?php

namespace App\Mail;

use App\Models\CalendarReminder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CalendarReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    private $calendarReminder;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(CalendarReminder $calendarReminder)
    {
        $this->calendarReminder = $calendarReminder;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->calendarReminder . ' - Hatırlatıcı')->markdown('emails.calendar-reminder', [
            'calendarReminder' => $this->calendarReminder
        ]);
    }
}
