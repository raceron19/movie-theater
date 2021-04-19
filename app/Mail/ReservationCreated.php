<?php

namespace App\Mail;

use App\Models\Reservation;
use App\Models\Schedule;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation;
    public $schedule;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Reservation $reservation, Schedule $schedule)
    {
        $this->reservation = $reservation;
        $this->schedule = $schedule;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Your reservation was created')
            ->view('mail.reservation-created');
    }
}
