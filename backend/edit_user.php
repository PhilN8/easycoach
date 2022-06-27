<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('db_conn.php');
include_once "users.php";

$current = date('Y-m-d H:i:s');

function sanitize($option, $new_info)
{
    if ($option == 'tel_no')
        if (!filter_var($new_info, FILTER_VALIDATE_INT))
            return "Not+a+Valid+Tel+Number";

    if ($option == 'id_no')
        if (!filter_var($new_info, FILTER_VALIDATE_INT))
            return "Not+a+Valid+ID+Number";

    return true;
}

function checkIfExists(mysqli $conn, $username)
{
    $sql = "SELECT COUNT(*) FROM `tbl_users` WHERE `user_name`='" . $username . "'";
    $check = $conn->query($sql);

    if (($check instanceof mysqli_result))
        if ($check->num_rows > 0)
            return false;

    return true;
}

function updateSession($option, $new_info)
{
    if ($option == 'first_name')
        $_SESSION['name'] = $new_info;

    if ($option == 'user_name')
        $_SESSION['user_name'] = $new_info;
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

if (isset($_POST['edit'])) {
    $value = $_POST['value'];
    $option = $_POST['option'];
    $new_info = $_POST['new_info'];
    $json = [];

    if (!in_array($value, $all_ids)) {
        $json = ['message' => 1];
    } else {
        if ($option == 'user_name')
            if (checkIfExists($conn, $new_info) == false)
                returnJson(['message' => 2]);


        if ($option == 'password')
            $new_info = md5($new_info);

        $sql = "UPDATE tbl_users SET $option='$new_info' WHERE `user_id` = $value";
        if ($option == 'tel_no' or $option == 'id_no')
            $sql = "UPDATE tbl_users SET $option=$new_info WHERE `user_id` = $value";

        if ($conn->query($sql) === TRUE) {
            if ($_SESSION['user_id'] == $value)
                updateSession($option, $new_info);

            $json = [
                'message' => 3,
                'info' => ucwords(str_replace("_", " ", $option))
            ];
        } else
            $json = ['message' => 4];
    }

    returnJson($json);
}

if (isset($_POST['edit-personal'])) {
    $val = $_POST['userID'];
    $option = $_POST['edit-option'];
    $new_info = $_POST['gender'] ?? $_POST['new-value'];

    $result = sanitize($option, $new_info);

    if (is_bool($result)) {
        if ($option == 'user_name')
            if (checkIfExists($conn, $new_info) == false)
                header('location:../homepage.php?error=User+Name+Already+Exists');

        if ($option == 'password')
            $new_info = md5($new_info);

        $sql = "UPDATE tbl_users SET $option = '$new_info',`updated_at`='$current' WHERE user_id = $val";
        if ($option == 'tel_no' or $option == 'id_no')
            $sql = "UPDATE tbl_users SET $option = $new_info,`updated_at`='$current' WHERE user_id = $val";

        if ($conn->query($sql) === TRUE) {
            updateSession($option, $new_info);
            header('location:../homepage.php?Message=Success&update=' . $option);
        } else
            header('location:../homepage.php?Message=Failed');
    } else
        header('location:../homepage.php?error=' . $result);
}
