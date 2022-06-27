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

if (isset($_POST['signup'])) {
    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);
    $fname = validate($_POST['fname']);
    $lname = validate($_POST['lname']);
    $gender = validate($_POST['gender']);

    $sql = "SELECT * FROM tbl_users WHERE `user_name`='$uname' ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0)
        returnJson(['message' => 1]);
    else {
        $pass = md5($pass);
        $sql2 = "INSERT INTO tbl_users(first_name, last_name, `user_name`, `password`,  `gender`, `role`) 
                            VALUES( '$fname', '$lname', '$uname', '$pass', '$gender', 1)";
        $result2 = mysqli_query($conn, $sql2);

        if ($result2)
            returnJson(['message' => 2]);
        else
            returnJson(['message' => 3]);
    }
}
