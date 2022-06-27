<?php
if (!isset($_SESSION))
    session_start();
require_once "db_conn.php";

$ticket_sql = "SELECT `purchase_id`, `first_name`, `last_name`, `tel_no`, `departure_date`, 
                COUNT(`seat_number`) AS `seats` FROM `tbl_ticket` GROUP BY `purchase_id`";

$result = $conn->query($ticket_sql);
if ($result->num_rows > 0)
    while ($rows = $result->fetch_assoc())
        $tickets[] = $rows;
