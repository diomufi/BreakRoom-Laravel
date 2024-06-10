<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Table</title>
    <link rel="stylesheet" href="{{ asset('css/tablebook.css') }}">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="stylesheet" href="{{ asset('fontawesome/fontawesome-free-6.2.1-web/css/all.css') }}">
    <script src="{{ asset('js/main.js') }}"></script>
</head>
<body>
    @include('layouts.sidebar')

    <div class="container">
        <div class="breakroom_text">
            <h3>Book Table</h3>
            <form id="bookingForm" action="{{ route('tablebook.store') }}" method="POST">
                @csrf
                <label for="id_member">ID Member:</label>
                <input type="text" id="id_member" name="id_member" required><br>
                <label for="table">Table Number:</label>
                <select id="table" name="table" required>
                    @foreach ($tables as $table)
                        <option value="{{ $table->id_table }}">{{ $table->id_table }}</option>
                    @endforeach
                </select><br>
                <input type="submit" value="Start">
            </form>
        </div>
    </div>
</body>
</html>
