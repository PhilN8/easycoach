<?php
session_start();
if (!isset($_SESSION['user_id'])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Login | EasyCoach Ke</title>

        <link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/toastr.css">
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


        <section class="login animate-opacity">
            <div class="container">

                <form action="backend/process_login.php" method="post" class="login__form" id="loginForm">
                    <h2 class="login__form--title">Login</h2>

                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?> <span onclick="this.parentElement.style.display = 'none';">&times;</span></p>
                    <?php } ?>

                    <?php if (isset($_GET['success'])) { ?>
                        <p class="success"><?php echo $_GET['success']; ?> <span onclick="this.parentElement.style.display = 'none';">&times;</span></p>
                    <?php } ?>

                    <!-- <?php if (isset($_GET['logout'])) { ?>
                        <p class="logout"><?php echo 'Logged out successfully'; ?> <span onclick="this.parentElement.style.display = 'none';">&times;</span></p>
                    <?php } ?> -->

                    <div class="login__form--box">
                        <input type="text" placeholder=" " name="uname" id="uname" class="login__form--input">
                        <label for="uname" class="login__form--label">User Name</label><br>
                    </div>

                    <div class="login__form--box">
                        <input type="password" id="password" name="password" placeholder=" " class="login__form--input w3-input"><br>
                        <label for="password" class="login__form--label">Password</label>
                    </div>

                    <button type="submit" class="login__form--btn">Login</button>
                </form>

            </div>
        </section>

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
                        <p class="footer__col--title">About Us</p>
                        <p class="footer__col--text">
                            Our mission is to be the Best Road Passenger Transport Company in East Africa.

                            We are a passenger transport and courier service provider registered in the
                            Republic of Kenya with an extensive branch network in Western and Nyanza provinces.

                        </p>
                    </section>

                    <section class="footer__col">
                        <p class="footer__col--title">
                            Quick Links
                        </p>

                        <ul class="footer__col--list">
                            <li class="footer__col--item"><a href="login.php" class="footer__col--link">Admin Login</a></li>
                            <li class="footer__col--item"><a href="services.html" class="footer__col--link">Services</a></li>
                            <li class="footer__col--item"><a href="about-us.html" class="footer__col--link">About Us</a></li>
                            <li class="footer__col--item"><a href="routes.html" class="footer__col--link">Routes</a></li>
                        </ul>
                    </section>
                </div>


            </div>

            <p class="footer__bottom--text">
                © Copyright - EasyCoach Ltd.
            </p>
        </footer>

        <script src="scripts/jquery.min.js"></script>
        <script src="scripts/toastr.js"></script>
        <script src="scripts/nav.js"></script>
        <script src="scripts/login.js"></script>

    </body>

    </html>

<?php } else ($_SESSION['role'] == 2) ?  header('location:homepage.php') : header('location:admin.php');
