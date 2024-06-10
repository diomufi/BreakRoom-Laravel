<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Booking Table</title>
    <link rel="stylesheet" href="{{ asset('css/livetable.css') }}">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="stylesheet" href="{{ asset('fontawesome/fontawesome-free-6.2.1-web/css/all.css') }}">
</head> 
<body>
    @include('layouts.sidebar')
    <div class="container">
        <h2>Live Booking Table</h2>
        <table id="liveTable">
            <thead>
                <tr>
                    <th>ID Member</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Table Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($bookings->count() > 0)
                @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->id_member }}</td>
                    <td>{{ $booking->Name }}</td>
                    <td>{{ $booking->Date }}</td>
                    <td>{{ $booking->Time }}</td>
                    <td>{{ $booking->id_table }}</td>
                    <td>
                        <form action="{{ route('stop-booking') }}" method="POST" target="_blank">
                            @csrf
                            <input type="hidden" name="id_trxTableBilliard" value="{{ $booking->id_trxTableBilliard }}">
                            <button type="submit">Stop</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6">Tidak ada data yang ditemukan</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</body>

</html>