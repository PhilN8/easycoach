<?php

require_once "db_conn.php";

$route_sql = 'SELECT * FROM tbl_routes';
$result = $conn->query($route_sql);
$places = [];

if ($result->num_rows > 0) {
    while ($rows = $result->fetch_assoc()) {
        $routes[] = $rows;

        if (!in_array($rows['destination'], $places))
            array_push($places, $rows['destination']);

        if (!in_array($rows['departure'], $places))
            array_push($places, $rows['departure']);
    }
}

if (isset($_POST['route_id'])) {
    $route = $_POST['route_id'];
    $cost_sql = "SELECT `cost` FROM `tbl_routes` WHERE `route_id`=" . $route;

    $cost = $conn->query($cost_sql)->fetch_assoc()['cost'];
    echo json_encode(['cost' => $cost]);
}

if (isset($_POST['searchRoute'])) {
    $destination = $_POST['destination'];
    $departure = $_POST['departure'];
    $search_sql = "SELECT * FROM `tbl_routes` WHERE `destination`='$destination' AND `departure`='$departure'";

    $result = $conn->query($search_sql)->fetch_assoc();

    if (is_null($result))
        echo json_encode(['msg' => 'No error detected']);
    else
        echo json_encode($result);
}

if (isset($_POST['add-route'])) {
    $destination = $_POST['destination'];
    $departure = $_POST['departure'];
    $price = $_POST['price'];

    $check_sql = "SELECT * FROM `tbl_routes` WHERE `departure`='$departure' AND `destination`='$destination'";

    $result = $conn->query($check_sql)->fetch_assoc();

    var_dump($result);

    if (!is_null($result)) {
        header('location:../admin.php?route=exists');
    } else {
        $add_route_sql = "INSERT INTO `tbl_routes`(`departure`, `destination`, `cost`)
        VALUES('$departure', '$destination', '$price')";

        if ($conn->query($add_route_sql) === TRUE)
            header('location:../admin.php?route=yes');
        else
            header('location:../admin.php?route=no');
    }
}
