<?php
session_start();

if (/*isset($_SESSION['id']) &&*/isset($_SESSION['user_name'])) {

?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Home Page | Easy Coach Ke</title>

        <link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="css/homepage.css">
        <script src="scripts/jquery.min.js" async></script>
        <script src="scripts/homepage.js" async></script>
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
                    <li class="nav__item"><a href="javascript:void(0)" class="nav__link" onclick="openSection('ticket')">Book a Ticket</a></li>
                    <li class="nav__item"><a href="javascript:void(0)" class="nav__link" onclick="openSection('history')">History</a></li>
                    <li class="nav__item"><a href="javascript:void(0)" class="nav__link" onclick="openSection('profile')">Profile</a></li>
                    <li class="nav__item"><a href="backend/logout.php" class="nav__link nav__link--btn">Logout</a></li>
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

                <section class="home-section animate-opacity intro" id="intro">
                    <h2 class="intro__title">Welcome, <?php echo $_SESSION['name'] ?></h2>
                    <p class="intro__text">Proceed to book your ticket now!</p>

                    <button class="intro__btn" onclick="openSection('ticket')">Book a Ticket</button>
                </section>

                <section class="history home-section animate-opacity" id="history">
                    <h2 class="history__title">History of Purchases</h2>
                    <?php if (isset($purchase_records) && (count($purchase_records) > 0)) { ?>
                        <table class="history__table"></table>
                    <?php } else { ?>
                        <p class="history__text">No Records of Purchased Tickets</p>
                    <?php } ?>
                </section>

                <section class="home-section animate-opacity ticket" id="ticket">
                    <h2 class="ticket__title">Book a Ticket</h2>
                </section>

                <section class="home-section animate-opacity profile" id="profile">
                    <h2 class="profile__title">Edit Profile</h2>
                    <form action="backend/edit_user.php" id="editForm" method="POST">

                        <input type="hidden" name="userID" value="<?= $_SESSION['user_id'] ?>">

                        <label for="edit-option">Choose column to edit</label>
                        <select name="options" id="edit-option" class="w3-input" onchange="changeOpt()">
                            <option value="first_name">First Name</option>
                            <option value="last_name">Last Name</option>
                            <option value="user_name">User Name</option>
                            <option value="tel_no">Tel Number</option>
                            <option value="id_no">ID Number</option>
                            <option value="password">Password</option>
                            <option value="gender">Gender</option>
                        </select><br>

                        <label for="new-val">New Value</label>
                        <input type="text" name="new-update" placeholder="Enter new value..." id="new-val" class="w3-input"><br>

                        <label for="gender-option">Enter a new option</label>
                        <select name="gender" id="gender-option" disabled="disabled" class="w3-input">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>

                        <button class="w3-button w3-center w3-section complete__btn" type="submit" name="edit-personal">Complete</button>
                        <button class="w3-button w3-center w3-right w3-section delete__btn" type="submit" name="delete-user" id="delete-user">Delete</button>

                    </form>
                </section>
            </div>
        </main>


        <footer class="footer" style="position: fixed; bottom: 0; left: 0; width: 100%; padding-top: 0;">

            <!-- <div class="container">
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


            </div> -->

            <p class="footer__bottom--text">
                © Copyright - EasyCoach Ltd.
            </p>
        </footer>

        <script src="scripts/nav.js"></script>

    </body>

    </html>

<?php
} else {
    header("Location: login.php");
    exit();
}
?>