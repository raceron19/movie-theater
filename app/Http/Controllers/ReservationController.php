<?php

namespace App\Http\Controllers;

use App\Mail\ReservationCreated;
use App\Models\Reservation;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    public function store(Request $request, Schedule $schedule)
    {
        /**
         * as in the others controllers, first we validate the request, this must be a FormRequest class
         * so we can have tiny functions and good code quality
         */ 
        $data = $request->validate([
            'name' => ['required'], 
            'identifier' => ['required','numeric','digits:9'], 
            'email' => ['required','email'], 
            'phone' => ['required','numeric','digits:8'], 
            'seats' => ['required', 'numeric','between:1,1000'],
        ]);
        
        // we need to check that the seats requested not exceed the seats avaliable
        $seatsOccupied = Reservation::where('schedule_id',$schedule->id)
            ->get()->pluck('seats'); // getting the seats occupied with eloquent
        $seatsAvaliable = ($seatsOccupied->count() === 0) // if the last variable has zero elements it means there's any reservation for that schedule yet
            ? $schedule->capacity // if true the seats available are the total capacity of the schedule
            : $schedule->capacity - $seatsOccupied->sum(); // otherwise the seats available are this difference
        if ($data['seats'] > $seatsAvaliable) { // if the requested seats number is higher than the seats available return this error
            return response()->json([
                "message" => "The seats requested exceed the seats available",
                "seatsAvailable" => $seatsAvaliable
            ],400);
        }
        // if available seats are higher than the requested seats then save the reservation
        $reservation = $schedule->reservations()->create($data);

        /**
         * This line below is one way to send emails in Laravel, we just need to run de php artisan make:mail NameYouWantForYourMailClass
         * and then make the configuration as you see in the ReservationCreated mail class and set up the env vars related 
         * to mail stuff, a good option to test in development it's using mailtrap.  
         */
        Mail::to($data['email'])->send(new ReservationCreated($reservation, $schedule));
        return $reservation;
    }
}
