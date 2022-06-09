<?php
if (!isset($_SESSION))
    session_start();
require_once "db_conn.php";

$ticket_sql = 'SELECT a.`ticket_id`, b.`departure`, b.`destination`, a.`cost`, a.`departure_date` 
                FROM `tbl_ticket_users` AS a
                INNER JOIN `tbl_routes` AS b 
                WHERE a.`route_id` = b.`route_id`;';

if ($_SESSION['role'] == 2)
    $ticket_sql = "SELECT a.`ticket_id`, b.`departure`, b.`destination`, a.`cost`, a.`departure_date` 
                    FROM `tbl_ticket_users` AS a
                    INNER JOIN `tbl_routes` AS b 
                    WHERE a.`route_id` = b.`route_id` AND a.`user_id`=" . $_SESSION['user_id'];

$result = $conn->query($ticket_sql);

if ($result->num_rows > 0)
    while ($rows = $result->fetch_assoc())
        $tickets[] = $rows;
