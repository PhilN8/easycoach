<?php
session_start();

include_once "backend/routes.php";
include_once "backend/tickets.php";

if (isset($_SESSION['user_id']) && $_SESSION['role'] == 2) {

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
        <script src="scripts/jquery.min.js"></script>
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
                    <li class="nav__item"><a href="javascript:void(0)" class="nav__link" onclick="openSection('wallet')">Wallet</a></li>
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

        <?php if (isset($_POST['seats'])) { ?>
            <script>
                $(document).ready(function() {
                    openSection('ticket');
                    // document.getElementById('ticket__form--details').scrollIntoView();
                    const ticket = document.getElementById('ticket__form--details')

                    window.scrollTo({
                        top: ticket,
                        behavior: 'smooth'
                    })
                });
            </script>
        <?php } ?>

        <main class="main">
            <div class="container">

                <section class="home-section animate-opacity intro" id="intro">
                    <?php if (isset($_GET['Message']) && $_GET['Message'] == 'Success') { ?>
                        <div class="intro__messages--success">
                            <span class="intro__messages--span" onclick="this.parentElement.style.display = 'none'">&times;</span>
                            <h2 class="intro__messages--title">Success</h2>
                            <p class="intro__messages--text">
                                <?= ucwords(str_replace("_", " ", $_GET['update'])) ?> Updated!
                            </p>
                        </div>
                    <?php } ?>

                    <?php if (isset($_GET['Message']) && $_GET['Message'] == 'Failed') { ?>
                        <div class="intro__messages--failed">
                            <span class="intro__messages--span" onclick="this.parentElement.style.display = 'none'">&times;</span>
                            <h2 class="intro__messages--title">Update Failed</h2>
                            <p class="intro__messages--text">
                                Please try again later...
                            </p>
                        </div>
                    <?php } ?>

                    <?php if (isset($_GET['error'])) { ?>
                        <div class="intro__messages--failed">
                            <span class="intro__messages--span" onclick="this.parentElement.style.display = 'none'">&times;</span>
                            <h2 class="intro__messages--title">Update Failed</h2>
                            <p class="intro__messages--text">
                                <?= ucwords($_GET['error']) ?>
                            </p>
                        </div>
                    <?php } ?>

                    <?php if (isset($_GET['booking'])) { ?>
                        <div class="intro__messages--success">
                            <span class="intro__messages--span" onclick="this.parentElement.style.display = 'none'">&times;</span>
                            <h2 class="intro__messages--title">Booking Successful</h2>
                            <p class="intro__messages--text">
                                Thank you for booking with us!
                            </p>
                        </div>
                    <?php } ?>

                    <?php if (isset($_GET['no-booking'])) { ?>
                        <div class="intro__messages--failed">
                            <span class="intro__messages--span" onclick="this.parentElement.style.display = 'none'">&times;</span>
                            <h2 class="intro__messages--title">Booking Failed</h2>
                            <p class="intro__messages--text">
                                Something went wrong while booking your ticket
                            </p>
                        </div>
                    <?php } ?>

                    <h2 class="intro__title">Welcome, <?php echo $_SESSION['name'] ?></h2>
                    <p class="intro__text">Proceed to book your ticket now!</p>

                    <button class="intro__btn" onclick="openSection('ticket')">Book a Ticket</button>
                </section>

                <section class="history home-section animate-opacity" id="history">
                    <h2 class="history__title">History of Purchases</h2>
                    <?php if (isset($tickets)) { ?>
                        <table class="history__table">
                            <thead>
                                <tr>
                                    <th>Ticket ID</th>
                                    <th>Departed From</th>
                                    <th>Destination</th>
                                    <th>Departure Date</th>
                                    <th>Cost</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tickets as $row) { ?>
                                    <tr>
                                        <td><?= $row['ticket_id'] ?></td>
                                        <td><?= $row['departure'] ?></td>
                                        <td><?= $row['destination'] ?></td>
                                        <td><?= $row['departure_date'] ?></td>
                                        <td><?= $row['cost'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } else { ?>
                        <p class="history__text">No Records of Purchased Tickets</p>
                    <?php } ?>
                </section>

                <section class="wallet home-section animate-opacity" id="wallet">
                    <h2 class="wallet__title">Wallet</h2>
                    <p class="wallet__text">
                        Add Funds to your E-Wallet!
                    </p>
                    <button class="complete__btn">Add Funds</button>
                </section>

                <section class="home-section animate-opacity ticket" id="ticket">
                    <h2 class="ticket__title">Book a Ticket</h2>

                    <form action="backend/book_ticket.php" method="post" class="ticket__form" id="ticket__form--details">

                        <div class="ticket__form--container">

                            <div class="ticket__form--box">
                                <input type="number" name="seats" id="seats" class="ticket__form--input" min="1" value="1">
                                <label for="cost" class="ticket__form--label">Number of Seats</label>
                            </div>

                            <div class="ticket__form--box">
                                <select name="route" id="route" class="ticket__form--input">
                                    <?php if (isset($routes)) {
                                        foreach ($routes as $row) { ?>
                                            <option value="<?= $row['route_id'] ?>"><?php echo $row['departure'] . " - " . $row['destination'] ?></option>
                                    <?php }
                                    } ?>
                                </select>
                                <label for="route" class="ticket__form--label">Choose Route</label>
                            </div>

                            <div class="ticket__form--box">
                                <input type="number" name="cost" id="cost" class="ticket__form--input" readonly>
                                <label for="cost" class="ticket__form--label">Cost</label>
                            </div>

                            <div class="ticket__form--box">
                                <input type="number" name="total-cost" id="total-cost" class="ticket__form--input" readonly>
                                <label for="total-cost" class="ticket__form--label">Total Cost</label>
                            </div>

                            <div class="ticket__form--box">
                                <input type="date" name="dep-date" id="dep-date" class="ticket__form--input" value="" placeholder="" />
                                <label for="dep-date" class="ticket__form--label">Departure Date</label>
                            </div>

                        </div>

                        <input type="hidden" name="userID" value="<?= $_SESSION['user_id'] ?>">
                        <button class="complete__btn" type="submit" name="book-ticket-user">Proceed</button>
                    </form>


                </section>

                <section class="home-section animate-opacity profile" id="profile">
                    <form action="backend/edit_user.php" method="post" class="profile__form">
                        <h2 class="profile__title">Edit Profile</h2>
                        <input type="hidden" name="userID" value="<?= $_SESSION['user_id'] ?>">

                        <div class="profile__form--box">
                            <select name="edit-option" id="edit-option" class="profile__form--input" onchange="changeOption()">
                                <option value="first_name" selected>First Name</option>
                                <option value="last_name">Last Name</option>
                                <option value="user_name">User Name</option>
                                <option value="tel_no">Tel Number</option>
                                <option value="id_no">ID Number</option>
                                <option value="password">Password</option>
                                <option value="gender">Gender</option>
                            </select>
                            <label for="new-val" class="profile__form--label">Choose Option</label>
                        </div>

                        <div class="profile__form--box">
                            <input type="text" name="new-value" id="new-value" class="profile__form--input" placeholder=" ">
                            <label for="new-value" class="profile__form--label">New Value</label>
                        </div>

                        <div class="profile__form--box">
                            <select name="gender" id="gender" disabled="disabled" class="profile__form--input">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <label for="new-val" class="profile__form--label">Enter your gender</label>
                        </div>

                        <button class="complete__btn" type="submit" name="edit-personal">Complete</button>
                        <!-- <button class="delete__btn" type="submit" name="delete-user" id="delete-user">Delete</button> -->
                    </form>
                </section>
            </div>
        </main>


        <footer class="footer" style="/*position: fixed; bottom: 0; left: 0; width: 100%;*/ padding-top: 0;">

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

            <!-- <p class="footer__bottom--text">
                © Copyright - EasyCoach Ltd.
            </p> -->
        </footer>

    </body>

    </html>

<?php
} else {
    header("Location: login.php");
    exit();
}
?>