<?php

session_start();
if (!isset($_SESSION['user_name'])) (header('location:login.php'));
else header('location:homepage.php');
?>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyCoach | HCI</title>

    <link rel="stylesheet" href="common.css">
    <link rel="stylesheet" href="index.css">
    <link rel="icon" href="img/title.jpeg" type="image/x-icon">
</head>

<body>
    <header class="header">
        <div class="brand">
            <h1 class="brand__title">
                <a href="#" class="brand__title--link">EasyCoach Ke</a>
            </h1>
        </div>

        <nav class="navbar">
            <ul class="nav__list">
                <li class="nav__item"><a href="#" class="nav__link">Home</a></li>
                <li class="nav__item"><a href="about-us.html" class="nav__link">About Us</a></li>
                <li class="nav__item"><a href="routes.html" class="nav__link">Routes</a></li>
                <li class="nav__item"><a href="services.html" class="nav__link">Services</a></li>
                <li class="nav__item"><a href="#" class="nav__link nav__link--btn">Book Online</a></li>
            </ul>
        </nav>

        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>

    </header>

    <footer class="footer">

        <div class="container">
            <div class="footer-container">
                <section class="footer__col">
                    <p class="footer__col--title">
                        Our Contacts
                    </p>

                    <p class="footer__col--contact">
                        Head Office: Railways Godown, Nairobi
                    </p>
                    <p class="footer__col--contact">
                        Email: info@easycoach.co.ke
                    </p>
                    <p class="footer__col--contact">
                        Phone: 0738200301
                    </p>
                    <p class="footer__col--contact">
                        Website: easycoach.co.ke
                    </p>

                </section>
                <section class="footer__col">
                    <p class="footer__col--title">
                        About Us
                    </p>

                    <p class="footer__col--text">
                        Our mission is to be the Best Road Passenger Transport Company in East Africa.

                        We are a passenger transport and courier service provider registered in the
                        Republic of Kenya with an extensive branch network in Western and Nyanza provinces.

                    </p>
                </section>
                <section class="footer__col">
                    <p class="footer__col--title">
                        Popular Destinations
                    </p>

                    <p class="footer__col--text">
                        Kisii | Kisumu | Ugunja | Maseno | Bondo | Nyamira | Migori | Mbale | Kericho | Kakamega | Rongo | Oyugis | Awendo | Sotik | Busia | Narok | Sirare | Bumala | Siaya | Homabay | Keroka and more...
                    </p>
                </section>
            </div>


        </div>

        <p class="footer__bottom--text">
            © Copyright - EasyCoach Ltd.
        </p>
    </footer>

    <script src="nav.js"></script>
</body>

</html> -->