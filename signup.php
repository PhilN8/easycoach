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
                <a href="index.html" class="brand__title--link">EasyCoach Ke</a>
            </h1>
        </div>

        <nav class="navbar">
            <ul class="nav__list">
                <li class="nav__item"><a href="index.html" class="nav__link">Home</a></li>
                <li class="nav__item"><a href="about-us.html" class="nav__link">About Us</a></li>
                <li class="nav__item"><a href="routes.html" class="nav__link">Routes</a></li>
                <li class="nav__item"><a href="services.html" class="nav__link">Services</a></li>
                <li class="nav__item"><a href="login.php" class="nav__link nav__link--btn">Book Online</a></li>
            </ul>
        </nav>

        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>

    </header>

    <section class="register animate-opacity">
        <div class="register__title">Sign Up</div>
        <form action="backend/signup_check.php" method="post" class="register__form">

            <?php if (isset($_GET['error'])) { ?>
                <p class="register__error"><?php echo $_GET['error']; ?>
                    <span onclick="this.parentElement.style.display = 'none';">&times;</span>
                </p>
            <?php } ?>

            <div class="register__user--container">
                <div class="register__input--box">
                    <label for="fname" class="register__label">First Name</label>
                    <?php if (isset($_GET['fname'])) { ?>
                        <input value="<?= $_GET['fname'] ?>" placeholder="First Name" type="text" name="fname" id="fname" class="register__input">
                    <?php } else { ?>
                        <input placeholder="First Name" type="text" name="fname" id="fname" class="register__input">
                    <?php } ?>
                </div>
                <div class="register__input--box">
                    <label for="lname" class="register__label">Last Name</label>
                    <?php if (isset($_GET['lname'])) { ?>
                        <input value="<?= $_GET['lname'] ?>" placeholder="Last Name" type="text" name="lname" id="lname" class="register__input">
                    <?php } else { ?>
                        <input placeholder="Last Name" type="text" name="lname" id="lname" class="register__input">
                    <?php } ?>
                </div>
                <div class="register__input--box">
                    <label for="uname" class="register__label">User Name</label>
                    <?php if (isset($_GET['uname'])) { ?>
                        <input value="<?= $_GET['uname'] ?>" placeholder="User Name" type="text" name="uname" id="uname" class="register__input">
                    <?php } else { ?>
                        <input placeholder="User Name" type="text" name="uname" id="uname" class="register__input">
                    <?php } ?>
                </div>
                <div class="register__input--box">
                    <label for="tel_no" class="register__label">Tel No</label>
                    <input placeholder="Tel No" type="number" name="tel_no" id="tel_no" class="register__input">
                </div>
                <div class="register__input--box">
                    <label for="id_no" class="register__label">ID Number</label>
                    <input placeholder="ID Number" type="number" name="id_no" id="id_no" class="register__input">
                </div>
                <div class="register__input--box">
                    <label for="gender" class="register__label">Gender</label>
                    <select name="gender" id="gender" class="register__input">
                        <option value="male" selected>Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="register__input--box">
                    <label for="password" class="register__label">Password</label>
                    <input placeholder="Password" type="password" name="password" id="password" class="register__input">
                </div>
                <div class="register__input--box">
                    <label for="re_password" class="register__label">Confirm Password</label>
                    <input placeholder="Confirm Password" type="password" name="re_password" id="re_password" class="register__input">
                </div>
            </div>

            <div class="register__submit">
                <input type="submit" value="Register" name="sign-up" class="register__submit--btn">
            </div>

            <p class="register__link">
                <a href="login.php">Already have an account?</a>
            </p>
        </form>
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

    <script src="scripts/nav.js"></script>
</body>

</html>