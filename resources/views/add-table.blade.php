<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Table</title>
    <link rel="stylesheet" href="{{ asset('css/tablebook.css') }}">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="stylesheet" href="{{ asset('fontawesome/fontawesome-free-6.2.1-web/css/all.css') }}">
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        setTimeout(function() {
            var messageElement = document.querySelector('.message');
            if (messageElement) {
                messageElement.style.display = 'none';
            }
        }, 5000);
    </script>
</head>
<body>
@include('layouts.sidebar')

<div class="container">
    <div class="breakroom_text">
        <h3>Add Table</h3>
        @if(session('success'))
            <div class="message">{{ session('success') }}</div>
        @endif
        <form id="addTableForm" action="{{ route('add-table.submit') }}" method="POST">
            @csrf
            <label for="id_table">ID Table:</label>
            <input type="text" id="id_table" name="id_table" required><br>
            <label for="building">Building:</label>
            <input type="text" id="building" name="building" required><br>
            <label for="floor">Floor:</label>
            <input type="text" id="floor" name="floor" required><br>
            <label for="number">Table Number:</label>
            <input type="text" id="number" name="number" required><br>
            <input type="submit" value="Add Table">
        </form>
    </div>
</div>

</body>
</html>
