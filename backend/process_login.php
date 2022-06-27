<?php
session_start();
require_once "db_conn.php";

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function returnJson($data)
{
    ob_clean();
    header_remove();
    header('Access-Control-Allow-Origin: *');
    header("Content-type: application/json; charset=utf-8");
    http_response_code(200);
    echo json_encode($data);
    exit();
}

if (isset($_POST['uname']) && isset($_POST['password'])) {

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    // hashing the password
    $pass = md5($pass);

    $sql = "SELECT * FROM `tbl_users` WHERE `user_name`='$uname' AND `password`='$pass'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['user_name'] === $uname && $row['password'] === $pass) {
            $_SESSION['name'] = $row['first_name'];
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['msg'] = "Login Successful";

            returnJson(['message' => 1]);
        } else
            returnJson(['message' => 2]);
    } else
        returnJson(['message' => 2]);
}
