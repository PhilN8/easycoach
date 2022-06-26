<?php

require_once "db_conn.php";

$route_sql = 'SELECT * FROM tbl_routes';
$result = $conn->query($route_sql);
$places = [];

if ($result->num_rows > 0)
    while ($rows = $result->fetch_assoc())
        $routes[] = $rows;


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

if (isset($_POST['add_route'])) {
    $destination = $_POST['destination'];
    $departure = $_POST['departure'];
    $price = $_POST['price'];

    $check_sql = "SELECT * FROM `tbl_routes` WHERE `departure`='$departure' AND `destination`='$destination'";

    $result = $conn->query($check_sql)->fetch_assoc();

    if (!is_null($result)) {
        echo json_encode(['message' => 1]);
    } else {
        $add_route_sql = "INSERT INTO `tbl_routes`(`departure`, `destination`, `cost`)
        VALUES('$departure', '$destination', '$price')";

        if ($conn->query($add_route_sql) === TRUE) {
            $result = $conn->query($route_sql);

            while ($row = $result->fetch_assoc())
                $allRoutes[] = $row;

            echo json_encode(['message' => 2, $allRoutes]);
        } else
            echo json_encode(['message' => 3]);
    }
}

if (isset($_POST['routes'])) {
    $result = $conn->query($route_sql);
    while ($row = $result->fetch_assoc())
        $routes[] = $row;

    echo json_encode($routes);
}

if (isset($_POST['new_cost'])) {
    $new_cost = $_POST['new_cost'];
    $route_id = $_POST['route'];

    $new_cost_sql = "UPDATE `tbl_routes` SET `cost`=$new_cost WHERE `route_id`=$route_id";
    if ($conn->query($new_cost_sql) === TRUE)
        echo json_encode(['message' => 1]);
    else
        echo json_encode(['message' => 2]);
}
