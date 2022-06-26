<?php
require_once "db_conn.php";

if (isset($_POST['dep_date'])) {
    $route = $_POST['route'];
    $dep_date = $_POST['dep_date'];

    $seats_sql = "SELECT `seat_number` FROM `tbl_ticket`  WHERE `departure_date` = '$dep_date'
                AND `purchase_id` IN (SELECT `purchase_id` FROM `tbl_purchases` WHERE
                `route_id` = $route)";

    $booked_seats = [];
    $result = $conn->query($seats_sql);

    while ($row = $result->fetch_assoc())
        $booked_seats[] = $row['seat_number'];

    echo json_encode($booked_seats);
}
