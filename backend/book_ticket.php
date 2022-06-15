<?php
require_once "db_conn.php";
print_r($_POST);

if (isset($_POST['book-ticket'])) {
    $cost = $_POST['cost'];
    $total_cost = $_POST['total-cost'];
    $seats = $_POST['seats'];
    $dep_date = $_POST['dep-date'];
    $route = $_POST['route'];
    $user_id = $_POST['userID'];

    $purchase_sql = "INSERT INTO `tbl_purchases`(`route_id`, `number_of_seats`, `total_cost`)
                    VALUES($route, $seats, $total_cost)";

    if ($conn->query($purchase_sql) === TRUE) {
        $purchase_id = $conn->insert_id;

        for ($i = 0; $i < $seats; $i++) {
            $ticket_sql = "INSERT INTO `tbl_ticket_users`(`route_id`, `user_id`, `purchase_id`, `departure_date`)
                        VALUES($route, $user_id, $purchase_id, '$dep_date')";

            $conn->query($ticket_sql);
        }

        header('location:../homepage.php?booking=yes');
    } else header('location:../homepage.php?no-booking=yes');
}
