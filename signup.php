<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | EasyCoach Ke</title>
    <link rel="shortcut icon" href="https://th.bing.com/th/id/R.82e1ab0db6d33eb2c369e41d01aef007?rik=6ajmi%2f5O62MJVA&pid=ImgRaw" type="image/x-icon">

    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" type="text/css" href="css/signup.css">
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
                <li class="nav__item"><a href="book_online.php" class="nav__link nav__link--btn">Book Online</a></li>
            </ul>
        </nav>

        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>

    </header>

    <form class="animate-opacity" action="backend/signup_check.php" method="post">
        <h2>Sign Up</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

        <label>First Name</label>
        <?php if (isset($_GET['fname'])) { ?>
            <input type="text" name="fname" placeholder="First Name" value="<?php echo $_GET['lname']; ?>"><br>
        <?php } else { ?>
            <input type="text" name="fname" placeholder="First Name"><br>
        <?php } ?>

        <label>Last Name</label>
        <?php if (isset($_GET['lname'])) { ?>
            <input type="text" name="lname" placeholder="Last Name" value="<?php echo $_GET['lname']; ?>"><br>
        <?php } else { ?>
            <input type="text" name="lname" placeholder="Last Name"><br>
        <?php } ?>

        <label>User Name</label>
        <?php if (isset($_GET['uname'])) { ?>
            <input type="text" name="uname" placeholder="User Name" value="<?php echo $_GET['uname']; ?>"><br>
        <?php } else { ?>
            <input type="text" name="uname" placeholder="User Name"><br>
        <?php } ?>

        <label>Tel Number</label>
        <input type="number" name="tel_no" placeholder="Tel Number"><br>

        <label>ID Number</label>
        <input type="number" name="id_no" placeholder="ID Number"><br>

        <label>Password</label>
        <select name="gender" id="gender">
            <option value="male" selected>Male</option>
            <option value="female">Female</option>
        </select><br>

        <label>Password</label>
        <input type="password" name="password" placeholder="Password"><br>

        <label>Confirm Password</label>
        <input type="password" name="re_password" placeholder="Re_Password"><br>

        <button type="submit" name="sign-up">Sign Up</button>
        <a href="login.php" class="ca">Already have an account?</a>
        <!-- <a href="index.php" class="ca">Home Page</a> -->
    </form>

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

</html>