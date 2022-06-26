<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You | Easy Coach Ke</title>

    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/redirect.css">
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

    <script>

    </script>

    <main class="main">
        <div class="container">

            <section class="intro animate-opacity" id="intro">
                <h2 class="intro__title">Enjoy Your Trip</h2>
                <p class="intro__text">
                    Thank you for purchasing from EasyCoach Ltd.
                </p>

                <div class="intro__links">
                    <a class="intro__links--btn" target="_blank" href="print.php?id=<?= $_GET['id'] ?? 0 ?>">Print</a>
                    <a class="intro__links--btn" href="index.html">Home</a>
                </div>
            </section>

            <section class="info animate-opacity" id="info">
                <table class="info__table">
                    <thead>
                        <tr>
                            <th colspan="2">Ticket Info</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td class="have-id" id="name"></td>
                        </tr>
                        <tr>
                            <td>Tel No</td>
                            <td class="have-id" id="tel_no"></td>
                        </tr>
                        <tr>
                            <td>ID No</td>
                            <td class="have-id" id="id_no"></td>
                        </tr>
                        <tr>
                            <td>Route</td>
                            <td class="have-id" id="route"></td>
                        </tr>
                        <tr>
                            <td>Date</td>
                            <td class="have-id" id="date"></td>
                        </tr>
                        <tr>
                            <td>Seat Numbers</td>
                            <td class="have-id" id="seats"></td>
                        </tr>
                        <tr>
                            <td>Total Cost</td>
                            <td class="have-id" id="total-cost"></td>
                        </tr>
                    </tbody>
                </table>
            </section>

        </div>
    </main>

    <script src="scripts/jquery.min.js"></script>
    <script src="scripts/nav.js"></script>
    <script src="scripts/redirect.js"></script>
</body>

</html>