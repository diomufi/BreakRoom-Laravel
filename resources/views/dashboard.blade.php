<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <link rel="stylesheet" href="{{ asset('fontawesome/fontawesome-free-6.2.1-web/css/all.css') }}">
    <style>
        body {
            background-color: #222;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .widget-container {
            display: flex;
            gap: 20px;
            padding: 70px;
            flex-wrap: wrap;
        }

        .widget {
            background: #444;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            flex: 1 1 200px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: transform 0.2s;
        }

        .widget:hover {
            transform: translateY(-10px);
        }

        .widget i {
            font-size: 3rem;
            margin-bottom: 10px;
            color: #ffcc00;
        }

        .widget h3 {
            font-size: 1.5rem;
            margin: 0;
        }

        .widget p {
            font-size: 1rem;
            margin: 5px 0 0;
            color: #ccc;
        }

        #currentDateTime {
            font-size: 2rem;
            color: #ffcc00;
        }
    </style>
</head>
<body>
    @include('layouts.sidebar')

    <div class="content">
        <div class="widget-container">
            <div class="widget">
                <h3 id="currentDateTime"></h3>
                <p>{{ auth()->user()->Nama }}</p>
            </div>
            <div class="widget">
                <i class="fa-solid fa-users"></i>
                <h3 id="memberCount">{{ $memberCount }}</h3>
                <p>Members</p>
            </div>
            <div class="widget">
                <i class="fa-solid fa-check-double"></i>
                <h3 id="availableTables">{{ $availableTables }}</h3>
                <p>Available Tables</p>
            </div>
            <div class="widget">
                <i class="fa-solid fa-vector-square"></i>
                <h3 id="totalTables">{{ $totalTables }}</h3>
                <p>Total Tables</p>
            </div>
        </div>
    </div>

    <script>
        function updateDateTime() {
            var now = new Date();
            var hours = now.getHours().toString().padStart(2, '0');
            var minutes = now.getMinutes().toString().padStart(2, '0');
            var seconds = now.getSeconds().toString().padStart(2, '0');
            var timeString = hours + ':' + minutes + ':' + seconds;
            document.getElementById('currentDateTime').textContent = timeString;
        }

        updateDateTime();
        setInterval(updateDateTime, 1000);
    </script>
</body>
</html>
