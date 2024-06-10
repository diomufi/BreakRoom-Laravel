<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/logreg.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</head>
<body>
<header>
    <div class="wrapper">
        <nav>
            <div class="logo">
                <h1>Break<span>Room.id</span></h1>
            </div>

            <input type="checkbox" id="click" />
            <label for="click" class="mobile_menu_btn">
                <i class="fa-solid fa-bars-staggered"></i>
            </label>
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="#">Table Available</a></li>
                <li><a href="#">Food & Beverage</a></li>
                <li><a href="#">Store</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="{{ route('login') }}" class="login-btn">Login</a></li>
            </ul>
        </nav>
    </div>
</header>
<div class="main">      
    <input type="checkbox" id="chk" aria-hidden="true">
    <div class="signup">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <label for="chk" aria-hidden="true">Sign up</label>
            <input type="text" name="nama" placeholder="Name" required="">
            <input type="text" name="username" placeholder="Username" required="">
            <input type="email" name="email" placeholder="Email" required="">
            <input type="password" name="pswd" placeholder="Password" required="">
            <button type="submit" name="signup">Sign up</button>
        </form>
    </div>
    <div class="login">
        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <label for="chk" aria-hidden="true">Login</label>
            <input type="email" name="email" placeholder="Email" required="">
            <input type="password" name="password" placeholder="Password" required="">
            <button type="submit" name="login">Login</button>
        </form>            
    </div>
</div>
</body>
</html>
