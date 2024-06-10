<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Member</title>
    <link rel="stylesheet" href="{{ asset('css/add-admin.css') }}">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="stylesheet" href="{{ asset('fontawesome/fontawesome-free-6.2.1-web/css/all.css') }}">
    <style>
        .message {
            margin-top: 10px;
            padding: 10px;
            color: #155724;
        }
    </style>
</head>

<body>
    @include('layouts.sidebar')
    <div class="container">
        <div class="breakroom_text">
            <h3>Add Member</h3>
            @if ($message = Session::get('success'))
            <div class="message">{{ $message }}</div>
            @endif
            @if ($error_message = Session::get('error'))
            <div class="message">Error: {{ $error_message }}</div>
            @endif
            <form method="post" action="{{ route('member.store') }}">
                @csrf
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required><br>
                <label for="member_type">Member Type:</label>
                <select id="member_type" name="member_type" required>
                    <option value="Silver">Silver</option>
                    <option value="Gold">Gold</option>
                    <option value="Platinum">Platinum</option>
                </select><br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>

    <script>
        window.onload = function() {
            var successMessage = document.querySelector('.message');
            if (successMessage) {
                setTimeout(function() {
                    successMessage.style.display = 'none';
                }, 5000);
            }
        };
    </script>
</body>

</html>