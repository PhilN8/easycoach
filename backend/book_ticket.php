<?php
require_once "db_conn.php";
print_r($_POST);

if (isset($_POST['book-ticket'])) {
    $cost = $_POST['cost'];
    $dep_date = "'" . $_POST['dep_date'] . "'";
    $route = $_POST['route'];
    $userID = $_POST['userID'];

    $sql = "INSERT INTO `tbl_ticket_users`(`route_id`, `user_id`, `cost`, `departure_date`)
            VALUES($route, $userID, $cost, $dep_date)";

    if ($conn->query($sql) == TRUE)
        header('location:../homepage.php?booking=yes');
    else
        header('location:../homepage.php?no-booking=yes');
}
