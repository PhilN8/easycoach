<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send a Package | EasyCoach Ke</title>

    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/package.css">
    <link rel="icon" href="img/title.jpeg" type="image/x-icon">

    <script src="scripts/nav.js" async></script>
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

    <main class="package">
        <div class="container package-container">
            <h1 class="package__title">Send A Package</h1>
            <p class="package__description">
                Use our extensive network to send letters, packages, documents and parcels.
            </p>
            <form action="backend/send_package.php" method="post" class="package__form">
                <h2 class="package__form--title">Package Details</h2>
                <div class="package__form--details">
                    <div class="package__form--box">
                        <input type="text" name="package-type" id="package-type" class="package__form--input" placeholder=" ">
                        <label for="package-type" class="package__form--label">Type</label>
                    </div>
                    <div class="package__form--box">
                        <input type="number" name="package-weight" id="package-weight" class="package__form--input" placeholder=" ">
                        <label for="package-weight" class="package__form--label">Weight</label>
                    </div>
                    <div class="package__form--box">
                        <input type="text" name="package-destination" id="package-destination" class="package__form--input" placeholder=" ">
                        <label for="package-destination" class="package__form--label">Destination</label>
                    </div>
                </div>

                <h2 class="package__form--title">Sender Details</h2>
                <div class="package__form--details">
                    <div class="package__form--box">
                        <input type="text" name="sender-fname" id="sender-fname" class="package__form--input" placeholder=" ">
                        <label for="sender-fname" class="package__form--label">First Name</label>
                    </div>
                    <div class="package__form--box">
                        <input type="text" name="sender-lname" id="sender-lname" class="package__form--input" placeholder=" ">
                        <label for="sender-lname" class="package__form--label">Last Name</label>
                    </div>
                    <div class="package__form--box">
                        <input type="number" name="sender-phone" id="sender-phone" class="package__form--input" placeholder=" ">
                        <label for="sender-phone" class="package__form--label">Phone Number</label>
                    </div>
                </div>

                <h2 class="package__form--title">Receiver Details</h2>
                <div class="package__form--details">
                    <div class="package__form--box">
                        <input type="text" name="rcvr-fname" id="rcvr-fname" class="package__form--input" placeholder=" ">
                        <label for="rcvr-fname" class="package__form--label">First Name</label>
                    </div>
                    <div class="package__form--box">
                        <input required type="text" name="rcvr-lname" id="rcvr-lname" class="package__form--input" placeholder=" ">
                        <label for="rcvr-lname" class="package__form--label">Last Name</label>
                    </div>
                    <div class="package__form--box">
                        <input type="number" name="rcvr-phone" id="rcvr-phone" class="package__form--input" placeholder=" ">
                        <label for="rcvr-phone" class="package__form--label">Phone Number</label>
                    </div>
                </div>

            </form>
        </div>
    </main>

    <footer class="footer">
        <p class="footer__bottom--text">© Copyright - EasyCoach Ltd.</p>
    </footer>
</body>

</html>