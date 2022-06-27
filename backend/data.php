<?php
require_once "db_conn.php";

$total_routes_sql = "SELECT COUNT(*) as `total` FROM `tbl_routes`";
$total_routes = $conn->query($total_routes_sql)->fetch_assoc()['total'];

$total_earnings_sql = "SELECT SUM(`total_cost`) as `total` FROM `tbl_purchases`";
$total_earnings = $conn->query($total_earnings_sql)->fetch_assoc()['total'];

$total_admins_sql = "SELECT COUNT(*) as `total` FROM `tbl_users`";
$total_admins = $conn->query($total_admins_sql)->fetch_assoc()['total'];

$total_tickets_sql = "SELECT COuNT(*) as `total` FROM `tbl_ticket`";
$total_tickets = $conn->query($total_tickets_sql)->fetch_assoc()['total'];

// echo json_encode([$total_earnings, $total_routes, $total_admins, $total_tickets]);
