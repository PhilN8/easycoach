<?php
require_once "db_conn.php";

if (isset($_POST['ticket_info'])) {
    $purchase_id = $_POST['ticket_info'];

    $seats_sql = "SELECT seat_number FROM `tbl_ticket` WHERE `purchase_id`=$purchase_id";

    $result = $conn->query($seats_sql);
    while ($row = $result->fetch_assoc())
        $seat_result[] = $row['seat_number'];

    $purchase_info_sql
        = "SELECT `a`.`first_name`, `a`.`last_name`, `a`.`departure_date`, `a`.`tel_no`,
         `a`.`id_number`, `a`.`total_cost`, `b`.`departure`, `b`.`destination` FROM `tbl_purchases` AS a 
         INNER JOIN `tbl_routes` AS `b` ON `b`.`route_id` = (SELECT `route_id` FROM 
         `tbl_purchases` WHERE `purchase_id` = $purchase_id) AND `a`.`purchase_id` =  $purchase_id";

    $result = $conn->query($purchase_info_sql)->fetch_assoc();

    echo json_encode([$result, $seat_result]);
}

if (isset($_POST['purchase_id'])) {
    $purchase_id = $_POST['purchase_id'];

    $seats_sql = "SELECT seat_number FROM `tbl_ticket` WHERE `purchase_id`=$purchase_id";

    $result = $conn->query($seats_sql);
    while ($row = $result->fetch_assoc())
        $seat_result[] = $row;

    $purchase_info_sql
        = "SELECT `a`.`first_name`, `a`.`last_name`, `a`.`departure_date`, `a`.`tel_no`,
         `a`.`id_number`, `a`.`total_cost`, `b`.`departure`, `b`.`destination` FROM `tbl_purchases` AS a 
         INNER JOIN `tbl_routes` AS `b` ON `b`.`route_id` = (SELECT `route_id` FROM 
         `tbl_purchases` WHERE `purchase_id` = $purchase_id) AND `a`.`purchase_id` =  $purchase_id";;

    $result = $conn->query($purchase_info_sql)->fetch_assoc();

    echo json_encode([$result, $seat_result]);
}
