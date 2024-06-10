<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>
    <link rel="stylesheet" href="{{ asset('css/add-admin.css') }}">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="stylesheet" href="{{ asset('fontawesome/fontawesome-free-6.2.1-web/css/all.css') }}">
    <script>
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('status') === 'success') {
                alert('New record created successfully');
            } else if (urlParams.get('status') === 'error') {
                alert('Error: ' + urlParams.get('message'));
            }
        };
    </script>
</head>

<body>
    @include('layouts.sidebar')

    <div class="container">
        <div class="breakroom_text">
            <h3>Add Admin</h3>
            <form method="post" action="{{ route('admin.store') }}">
                @csrf
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required><br>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br>
                <label for="role">Role:</label>
                <select id="role" name="role" required>
                    <option value="admin">Admin</option>
                    <option value="officer">Officer</option>
                </select><br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</body>

</html>
