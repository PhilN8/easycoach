<?php
require_once "db_conn.php";

if (isset($_POST['book-ticket-user'])) {
    $cost = $_POST['cost'];
    $total_cost = $_POST['total-cost'];
    $seats = $_POST['seats'];
    $dep_date = $_POST['dep-date'];
    $route = $_POST['route'];
    $user_id = $_POST['userID'];

    $purchase_sql = "INSERT INTO `tbl_purchases`(`route_id`, `number_of_seats`, `total_cost`, `role`)
                    VALUES($route, $seats, $total_cost, 2)";

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

if (isset($_POST['book-ticket'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $tel_no = $_POST['tel_no'];
    $id_no = $_POST['id_no'];

    $cost = $_POST['cost'];
    $total_cost = $_POST['total_cost'];
    $seats = $_POST['seats'];
    $dep_date = $_POST['dep_date'];
    $route = $_POST['route'];

    $num_seats = count($seats);

    $purchase_sql = "INSERT INTO `tbl_purchases`(`route_id`, `number_of_seats`, `total_cost`, `role`)
                    VALUES($route, $num_seats, $total_cost, 3)";

    if ($conn->query($purchase_sql) === TRUE) {
        $purchase_id = $conn->insert_id;

        for ($i = 0; $i < count($seats); $i++) {
            $seat_no = $seats[$i];
            $ticket_sql = "INSERT INTO `tbl_ticket`(`purchase_id`, `first_name`, `last_name`, `id_number`, `tel_no`, `seat_number`, `departure_date`)
                        VALUES($purchase_id, '$fname', '$lname', $id_no, $tel_no, $seat_no, '$dep_date')";

            $conn->query($ticket_sql);
        }

        // header('location:../book_online.php?booking=yes');
        echo json_encode(['message' => 1, 'id' => $purchase_id]);
    } else echo json_encode(['message' => $conn->error]);
}

if (isset($_POST['book-non-user'])) {
    print_r($_POST);
}
