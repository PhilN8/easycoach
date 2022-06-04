<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | EasyCoach Ke</title>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="888681290852-hacdqsm1hh17e3jg917rv3iotp63ri9o.apps.googleusercontent.com">
    <link rel="shortcut icon" href="https://th.bing.com/th/id/R.82e1ab0db6d33eb2c369e41d01aef007?rik=6ajmi%2f5O62MJVA&pid=ImgRaw" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/login.css">
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
                <li class="nav__item"><a href="index.html" class="nav__link">Home</a></li>
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


    <section class="login animate-opacity">
        <div class="container">

            <form action="backend/process_login.php" method="post" class="login__form">
                <h2 class="login__form--title">Login</h2>

                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?> <span onclick="this.parentElement.style.display = 'none';">&times;</span></p>
                <?php } ?>

                <?php if (isset($_GET['success'])) { ?>
                    <p class="success"><?php echo $_GET['success']; ?> <span onclick="this.parentElement.style.display = 'none';">&times;</span></p>
                <?php } ?>

                <?php if (isset($_GET['logout'])) { ?>
                    <p class="logout"><?php echo 'Logged out successfully'; ?> <span onclick="this.parentElement.style.display = 'none';">&times;</span></p>
                <?php } ?>

                <label for="uname" class="login__form--label">User Name</label><br>
                <input type="text" placeholder="User Name" name="uname" class="login__form--input w3-input" id="uname"><br>

                <label for="password" class="login__form--label">Password</label><br>
                <input type="password" id="password" name="password" placeholder="Password" class="login__form--input w3-input"><br>

                <button type="submit" class="login__form--btn">Login</button>

                <p class="login__form--text">New to EasyCoach? <a href="signup.php" class="login__form--link">Click Here</a></p>
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
                    <p class="footer__col--title">Popular Destinations</p>
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

    <script>
        function onSignIn(googleUser) {
            // get user profile information
            console.log(googleUser.getBasicProfile())
        }
    </script>
    <script>
        function onSignIn(googleUser) {
            var profile = googleUser.getBasicProfile();
            console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
            console.log('Name: ' + profile.getName());
            console.log('Image URL: ' + profile.getImageUrl());
            console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
        }
    </script>

    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId: 429191191821656,
                cookie: true,
                xfbml: true,
                version: '{api-version}'
            });

            FB.AppEvents.logPageView();

        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

</body>

</html>