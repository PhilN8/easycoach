<?php
if (!isset($_SESSION))
    session_start();
require_once "db_conn.php";

$ticket_sql = "SELECT `a`.`purchase_id`, `a`.`first_name`, `a`.`last_name`, 
    `a`.`departure_date`, `a`.`total_cost`, `b`.`departure`, `b`.`destination`, 
    COUNT(`c`.`seat_number`) AS `seats` FROM ((`tbl_purchases` AS a INNER JOIN 
    `tbl_ticket` AS c ON `a`.`purchase_id` = `c`.`purchase_id`) INNER JOIN 
    `tbl_routes` AS `b` ON `b`.`route_id` = `a`.`route_id`) GROUP BY `purchase_id`";

$result = $conn->query($ticket_sql);
if ($result->num_rows > 0)
    while ($rows = $result->fetch_assoc())
        $tickets[] = $rows;


        // SELECT `a`.`purchase_id`, `first_name`, `last_name`, `tel_no`, c.departure, c.destination, `a`.`departure_date`, COUNT(`b`.`seat_number`) AS `seats` FROM ((`tbl_purchases` AS a INNER JOIN `tbl_ticket` AS b GROUP BY `purchase_id`) 
// INNER JOIN `tbl_routes` AS c ON c.route_id = (SELECT route_id FROM tbl_purchases WHERE route_id = `tbl_purchases`))

// SELECT `a`.`first_name`, `a`.`last_name`, `a`.`departure_date`, `a`.`tel_no`,
        //  `a`.`id_number`, `a`.`total_cost`, `b`.`departure`, `b`.`destination` FROM `tbl_purchases` AS a 
        //  INNER JOIN `tbl_routes` AS `b` ON `b`.`route_id` = (SELECT `route_id` FROM 
        //  `tbl_purchases` WHERE `purchase_id` = $purchase_id) AND `a`.`purchase_id` =  $purchase_id

// SELECT `a`.`first_name`, `a`.`last_name`, `a`.`departure_date`, `a`.`tel_no`, `a`.`id_number`, `a`.`total_cost`, `b`.`departure`, `b`.`destination`, COUNT(c.seat_number) AS seats FROM ((`tbl_purchases` AS a INNER JOIN `tbl_ticket` AS c) INNER JOIN `tbl_routes` AS `b` ON `b`.`route_id` = (SELECT `route_id` FROM `tbl_purchases` WHERE `purchase_id` = 1) AND `a`.`purchase_id` =  1)