<?php
ini_set('display_errors', '1');
if (!isset($_SESSION)) {
    session_start();
}
require_once('db_conn.php');
include_once "users.php";

function check($option, $new_info)
{
    if ($option == 'email')
        if (!filter_var($new_info, FILTER_VALIDATE_EMAIL))
            return "Invalid+Email";


    if ($option == 'tel_no')
        if (!filter_var($new_info, FILTER_VALIDATE_INT))
            return "Not+a+Valid+Tel+Number";

    if ($option == 'id_no')
        if (!filter_var($new_info, FILTER_VALIDATE_INT))
            return "Not+a+Valid+ID+Number";

    return true;
}

if (isset($_POST['edit'])) {
    $val = $_POST['userID'];
    $option = $_POST['options'];
    $new_info = $_POST['gender'] ?? $_POST['new-update'];

    if (!in_array($val, $all_ids))
        header('location:../admin.php?error=Invalid+User+ID&user_id=' . $val);
    else {
        $result = check($option, $new_info);

        if (!is_string($result)) {
            if ($option == 'password')
                $new_info = md5($new_info);

            $sql = "UPDATE tbl_users SET $option='$new_info' WHERE user_id = $val";
            if ($option == 'tel_no' or $option == 'id_no')
                $sql = "UPDATE tbl_users SET $option=$new_info WHERE user_id = $val";

            if ($conn->query($sql) === TRUE)
                header('location:../admin.php?Message=Success&user_id=' . $val . '&update=' . $option);
            else
                header('location:../admin.php?Message=Failed&user_id=' . $val);
        } else
            header('location:../admin.php?error=' . $result . '&user_id=' . $val);
    }
}

if (isset($_POST['edit-personal'])) {
    $val = $_POST['userID'];
    $option = $_POST['options'];
    $new_info = $_POST['gender'] ?? $_POST['new-update'];

    $result = check($option, $new_info);

    if ($result) {
        if ($option == 'password')
            $new_info = password_hash($new_info, PASSWORD_DEFAULT);

        $sql = "UPDATE tbl_users SET $option='$new_info' WHERE user_id = $val";
        if ($option == 'tel_no' or $option == 'id_no')
            $sql = "UPDATE tbl_users SET $option=$new_info WHERE user_id = $val";

        if ($conn->query($sql) === TRUE)
            header('location:../homepage.php?Message=Success&user_id=' . $val . '&update=' . $option);
        else
            header('location:../homepage.php?Message=Failed&user_id=' . $val);
    } else
        header('location:../homepage.php?error=' . $result . '&user_id=' . $val);
}
