<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You | Easy Coach Ke</title>

    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/redirect.css">
    <script src="scripts/jquery.min.js"></script>
    <script src="scripts/nav.js" async></script>
    <link rel="icon" href="img/title.jpeg" type="image/x-icon">
</head>

<body>
    <header class="header">
        <div class="brand">
            <h1 class="brand__title">
                <a href="index.html" class="brand__title--link">EasyCoach Ke</a>
            </h1>
        </div>

        <nav class="navbar">
            <ul class="nav__list">
                <li class="nav__item"><a href="index.html" class="nav__link">Home</a></li>
                <li class="nav__item"><a href="about-us.html" class="nav__link">About Us</a></li>
                <li class="nav__item"><a href="routes.html" class="nav__link">Routes</a></li>
                <li class="nav__item"><a href="services.html" class="nav__link">Services</a></li>
                <li class="nav__item"><a href="book_online.php" class="nav__link nav__link--btn">Book Online</a></li>
            </ul>
        </nav>

        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>

    </header>

    <main class="main">
        <div class="container">
            <section class="intro animate-opacity">
                <h2 class="intro__title">Enjoy Your Trip</h2>
                <p class="intro__text">
                    Thank you for purchasing from EasyCoach Ltd.
                </p>

                <div class="intro__links">
                    <button class="intro__links--btn"><a href="print.php?id=<?= $_GET['id'] ?? 0 ?>">Print</a></button>
                    <button class="intro__links--btn"><a href="index.html">Home</a></button>
                </div>
            </section>
        </div>
    </main>
</body>

</html>