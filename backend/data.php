<?php
require_once "db_conn.php";

$total_routes_sql = "SELECT COUNT(*) as `total` FROM `tbl_routes`";
$total_routes = $conn->query($total_routes_sql)->fetch_assoc()['total'];

$total_earnings_sql = "SELECT SUM(`total_cost`) as `total` FROM `tbl_purchases`";
$total_earnings = $conn->query($total_earnings_sql)->fetch_assoc()['total'];

$total_admins_sql = "SELECT COUNT(*) as `total` FROM `tbl_users` WHERE `is_deleted` = 0";
$total_admins = $conn->query($total_admins_sql)->fetch_assoc()['total'];

$total_tickets_sql = "SELECT COuNT(*) as `total` FROM `tbl_ticket`";
$total_tickets = $conn->query($total_tickets_sql)->fetch_assoc()['total'];

$earnings_sql = "SELECT `b`.`route_id`, `b`.departure, `b`.destination, SUM(`a`.`total_cost`) 
                AS `earnings` FROM `tbl_purchases` AS a INNER JOIN `tbl_routes` AS b 
                ON `a`.`route_id` = `b`.`route_id` GROUP BY `b`.`route_id` ORDER BY `earnings` DESC";
$earnings_result = $conn->query($earnings_sql);
while ($row = $earnings_result->fetch_assoc())
    $earnings[] = $row;
