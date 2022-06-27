<?php
session_start();

if (isset($_SESSION['user_id']) && $_SESSION['role'] == 1) {

    include_once 'backend/users.php';
    include_once 'backend/tickets.php';
    include_once 'backend/routes.php';
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Admin Page | Easy Coach Ke</title>

        <link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="css/toastr.css">
        <link rel="stylesheet" href="css/admin.css">

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
                <h3>Menu</h3>
                <nav class="menu">
                    <a href="javascript:void(0)" class="menu-item active" onclick="openSection('intro')">Home</a>
                    <a href="javascript:void(0)" class="menu-item" onclick="openSection('history')">Purchase History</a>
                    <a href="javascript:void(0)" class="menu-item" onclick="openSection('routes')">Routes</a>
                    <h3>Users</h3>
                    <a href="javascript:void(0)" class="menu-item" onclick="openSection('profile')">Edit Profile</a>
                    <a href="javascript:void(0)" class="menu-item" onclick="openSection('users')">View Users</a>
                    <a href="javascript:void(0)" class="menu-item" onclick="openSection('add')">Add Admin</a>
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

                <section class="add admin-section animate-opacity" id="add">
                    <h2 class="routes__form--title">Add an Admin</h2>
                    <form action="backend/signup_check.php" method="POST" class="add__form" id="adminForm">

                        <div class="add__form--container">
                            <div class="routes__form--box">
                                <input type="text" class="routes__form--input" placeholder=" " id="fname" name="fname">
                                <label for="fname" class="routes__form--label">First Name</label>
                            </div>

                            <div class="routes__form--box">
                                <input type="text" class="routes__form--input" placeholder=" " id="lname" name="lname">
                                <label for="lname" class="routes__form--label">Last Name</label>
                            </div>

                            <div class="routes__form--box">
                                <input type="text" class="routes__form--input" placeholder=" " id="username" name="username">
                                <label for="username" class="routes__form--label">Username</label>
                            </div>

                            <div class="routes__form--box">
                                <select name="add-gender" id="add-gender" class="routes__form--input">
                                    <option value="male" selected>Male</option>
                                    <option value="female">Female</option>
                                </select>
                                <label for="add-gender" class="routes__form--label">Gender</label>
                            </div>

                            <div class="routes__form--box">
                                <input type="password" class="routes__form--input" placeholder=" " id="pword1" name="pword1">
                                <label for="pword1" class="routes__form--label">Enter Password</label>
                            </div>

                            <div class="routes__form--box">
                                <input type="password" class="routes__form--input" placeholder=" " id="pword2" name="pword2">
                                <label for="pword2" class="routes__form--label">Confirm Password</label>
                            </div>

                        </div>

                        <button class="complete__btn" type="submit">Add Admin</button>
                        <button class="delete__btn w3-right" type="reset">Reset</button>
                    </form>
                </section>

                <section class="admin-section profile animate-opacity" id="profile">
                    <h2>Edit Profile</h2>
                    <p>
                        Edit profiles of all users of the application.
                    </p>

                    <form action="backend/edit_user.php" class="profile__form" id="editForm" method="POST">

                        <div class="routes__form--box">
                            <input type="text" class="routes__form--input" placeholder=" " list="all-users" id="edit-user" name="edit-user">
                            <label for="edit-user" class="routes__form--label">Choose User</label>
                        </div>

                        <datalist id="all-users">

                            <?php foreach ($user_records as $row) { ?>
                                <option value="<?= $row['user_id'] ?>"><?= $row['user_id'] . ' - ' . $row['first_name'] . ' ' .  $row['last_name']   ?></option>
                            <?php } ?>

                        </datalist><br>

                        <div class="routes__form--box">
                            <select name="option" id="option" class="routes__form--input" onchange="changeOpt()">
                                <option value="first_name">First Name</option>
                                <option value="last_name">Last Name</option>
                                <option value="user_name">User Name</option>
                                <option value="password">Password</option>
                                <option value="gender">Gender</option>
                            </select>
                            <label for="option" class="routes__form--label">Choose column to edit</label>
                        </div><br>

                        <div class="routes__form--box">
                            <input type="text" name="new-update" id="new-update" placeholder=" " class="routes__form--input">
                            <label for="new-update" class="routes__form--label">New Value</label>
                        </div><br>

                        <div class="routes__form--box">
                            <select name="gender" id="gender" disabled="disabled" class="routes__form--input" aria-readonly="true">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <label for="gender" class="routes__form--label">Gender</label>
                        </div>

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
                    <div class="routes__div">
                        <p class="routes__form--title">Routes</p>
                        <div class="routes__div--table">
                            <table class="routes__table">
                                <thead>
                                    <tr>
                                        <th>Departure</th>
                                        <th>Destination</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="routeTable">
                                    <?php foreach ($routes as $route) {
                                        $id = $route['route_id']; ?>
                                        <tr>
                                            <td><?= $route['departure'] ?></td>
                                            <td><?= $route['destination'] ?></td>
                                            <td><?= $route['cost'] ?></td>
                                            <td><button class="routes__edit--btn" onclick="openModal(<?php echo $id ?>)">Edit</button></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="routes__form">
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
                        <button class="routes__btn" onclick="addRoute()" name="add-route">Add</button>
                    </div>

                </section>

                <section class="users admin-section animate-opacity" id="users">
                    <h2 class="users__title">View Users</h2>
                    <table class="users__table" style="overflow-x: scroll;">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>User Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="w3-animate-opacity" id="userTable">
                            <?php
                            foreach ($user_records as $user) {
                            ?>
                                <tr>
                                    <td><?= $user['user_id'] ?></td>
                                    <td><?= ($user['first_name'] != "") ? $user['first_name'] : "-" ?></td>
                                    <td><?= ($user['last_name'] != "") ? $user['last_name'] : "-" ?></td>
                                    <td><?= $user['user_name'] ?></td>
                                    <td><button class="users__edit--btn" onclick="editUser(<?= $user['user_id'] ?>)">Edit</button></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </section>
            </main>
        </div>

        <div class="modal" id="myModal">

            <div class="modal__content">
                <div class="modal__header">
                    <p>Enter New Value</p>
                    <span class="modal__header--close">&times;</span>
                </div>

                <div class="modal__body">
                    <div class="routes__form--box">
                        <input type="number" name="new-cost" id="new-cost" placeholder=" " class="routes__form--input">
                        <label for="new-cost" class="routes__form--label">Cost</label>
                    </div>
                </div>

                <button class="routes__btn" id="submitBtn">Submit</button>
                <button class="routes__btn float-right" id="cancelBtn">Cancel</button>
            </div>

        </div>

        <script src="scripts/jquery.min.js"></script>
        <script src="scripts/toastr.js"></script>
        <script src="scripts/admin.js"></script>
        <script>
            <?php if (isset($_SESSION['msg'])) : ?>
                toastr.success("Welcome Back!", "<?= $_SESSION['msg'] ?>")
            <?php unset($_SESSION['msg']);
            endif ?>
        </script>

    </body>

    </html>

<?php } else
    header('location:login.php');
