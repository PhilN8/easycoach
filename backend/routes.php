<?php

require_once "db_conn.php";

$route_sql = 'SELECT * FROM tbl_routes';
$result = $conn->query($route_sql);

if ($result->num_rows > 0)
    while ($rows = $result->fetch_assoc())
        $routes[] = $rows;


if (isset($_POST['route_id'])) {
    $route = $_POST['route_id'];
    $cost_sql = "SELECT `cost` FROM `tbl_routes` WHERE `route_id`=" . $route;

    $cost = $conn->query($cost_sql)->fetch_assoc()['cost'];
    echo json_encode(['cost' => $cost]);
}
