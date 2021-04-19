<div class="">
    <h1>Hi {{ $reservation->name }}</h1>
    <br><br>
    <p>You created a reservation with the following information: </p>
    <br>
    <ul>
        <li>Movie: {{ $schedule->movie->title }}</li>
        <li>Theater hall: {{ $schedule->theater_hall }}</li>
        <li>Date: {{ $schedule->date }}</li>
        <li>Seats: {{ $reservation->seats }}</li>
        <br>
        <strong>
            Total: {{ $reservation->seats * $schedule->movie->price }}
        </strong>
    </ul>
</div>
