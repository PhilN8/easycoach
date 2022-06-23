<?php
session_start();

if (isset($_SESSION['user_id']) && $_SESSION['role'] == 1) {

    include_once 'backend/users.php';
    include_once 'backend/tickets.php';
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Admin Page | Easy Coach Ke</title>

        <link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="css/admin.css">
        <script src="scripts/jquery.min.js" async></script>
        <script src="scripts/admin.js" async></script>
        <link rel="icon" href="img/title.jpeg" type="image/x-icon">
    </head>

    <body>
        <div class="app">

            <div class="menu-toggle">
                <div class="hamburger">
                    <span></span>
                </div>
            </div>

            <aside class="sidebar">
                <!-- <h3>Menu</h3> -->
                <nav class="menu">
                    <a href="javascript:void(0)" class="menu-item active" onclick="openSection('intro')">Home</a>
                    <a href="javascript:void(0)" class="menu-item" onclick="openSection('profile')">Profile</a>
                    <a href="javascript:void(0)" class="menu-item" onclick="openSection('history')">History</a>
                    <a href="javascript:void(0)" class="menu-item" onclick="openSection('users')">Users</a>
                    <a href="javascript:void(0)" class="menu-item" onclick="openSection('routes')">Routes</a>
                    <a href="backend/logout.php" class="menu-item menu-item__last">Logout</a>
                </nav>
            </aside>

            <main class="content">
                <section class="admin-section intro animate-opacity" id="intro">

                    <?php if (isset($_GET['route']) && $_GET['route'] == 'no') { ?>
                        <div class="intro__messages--failed">
                            <span class="intro__messages--span" onclick="this.parentElement.style.display = 'none'">&times;</span>
                            <h2 class="intro__messages--title">Failure</h2>
                            <p class="intro__messages--text">
                                Please try again later...
                            </p>
                        </div>
                    <?php } ?>

                    <?php if (isset($_GET['route']) && $_GET['route'] == 'yes') { ?>
                        <div class="intro__messages--success">
                            <span class="intro__messages--span" onclick="this.parentElement.style.display = 'none'">&times;</span>
                            <h2 class="intro__messages--title">Success</h2>
                            <p class="intro__messages--text">
                                Route Added Successfully
                            </p>
                        </div>
                    <?php } ?>

                    <?php if (isset($_GET['route']) && $_GET['route'] == 'exists') { ?>
                        <div class="intro__messages--failed">
                            <span class="intro__messages--span" onclick="this.parentElement.style.display = 'none'">&times;</span>
                            <h2 class="intro__messages--title">Warning</h2>
                            <p class="intro__messages--text">
                                Route Already Exists
                            </p>
                        </div>
                    <?php } ?>

                    <h1>Welcome, <?= $_SESSION['name'] ?? 'User' ?></h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Quisquam, odio! Atque optio voluptatem unde totam
                        vel vero facere asperiores obcaecati!
                    </p>
                </section>

                <section class="admin-section profile animate-opacity" id="profile">
                    <h2>Edit Profile</h2>
                    <p>
                        Edit profiles of all users of the application.
                    </p>

                    <form action="backend/edit_user.php" class="profile__form" id="editForm" method="POST">

                        <label for="edit-user">Choose User</label>
                        <input type="text" class="w3-input" list="all-users" id="edit-user" name="userID" onchange="noDelete(<?= $_SESSION['User-ID'] ?>)">
                        <datalist id="all-users">

                            <?php foreach ($user_records as $row) { ?>
                                <option value="<?= $row['user_id'] ?>"><?= $row['user_id'] . ' - ' . $row['first_name'] . ' ' .  $row['last_name']   ?></option>
                            <?php } ?>

                        </datalist><br>

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

                        <button class="w3-button w3-center w3-section complete__btn" type="submit" name="edit">Complete</button>
                        <button disabled class="w3-button w3-center w3-right w3-section delete__btn" type="submit" name="delete-user" id="delete-user">Delete</button>

                    </form>
                </section>

                <section class="history admin-section animate-opacity" id="history">
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

                <section class="routes admin-section animate-opacity" id="routes">
                    <form action="backend/routes.php" method="post" class="routes__form">
                        <h2 class="routes__form--title">Add Route</h2>
                        <div class="routes__form--container">
                            <div class="routes__form--box">
                                <input type="text" name="departure" id="departure" placeholder=" " class="routes__form--input">
                                <label for="departure" class="routes__form--label">Departure Point</label>
                            </div>

                            <div class="routes__form--box">
                                <input type="text" name="destination" id="destination" placeholder=" " class="routes__form--input">
                                <label for="destination" class="routes__form--label">Destination</label>
                            </div>

                            <div class="routes__form--box">
                                <input type="text" name="price" id="price" placeholder=" " class="routes__form--input">
                                <label for="price" class="routes__form--label">Price</label>
                            </div>
                        </div>

                        <button class="routes__btn" type="submit" name="add-route">Add</button>

                    </form>
                </section>

                <section class="users admin-section animate-opacity" id="users">
                    <h2 class="users__title">View Users</h2>
                    <table class="users__table" id="all-users">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>User Name</th>
                                <th>Gender</th>
                            </tr>
                        </thead>
                        <tbody class="w3-animate-opacity">
                            <?php
                            foreach ($user_records as $row) {
                            ?>
                                <tr>
                                    <td><?= $row['user_id'] ?></td>
                                    <td><?= ($row['first_name'] != "") ? $row['first_name'] : "-" ?></td>
                                    <td><?= ($row['last_name'] != "") ? $row['last_name'] : "-" ?></td>
                                    <td><?= $row['user_name'] ?></td>
                                    <td><?= ucfirst($row['gender']) ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </section>
            </main>
        </div>
    </body>

    </html>

<?php } else
    header('location:login.php');
