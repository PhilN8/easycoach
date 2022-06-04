<?php
session_start();
include "db_conn.php";

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['sign-up'])) {
    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);
    $re_pass = validate($_POST['re_password']);
    $fname = validate($_POST['fname']);
    $lname = validate($_POST['lname']);
    $gender = validate($_POST['gender']);
    $tel_no = validate($_POST['tel_no']);
    $id_no = validate($_POST['id_no']);

    $user_data = 'uname=' . $uname . '&fname=' . $fname . '&lname=' . $lname;

    if (empty($uname)) {
        header("Location: ../signup.php?error=User Name is required&$user_data");
        exit();
    } else if (empty($pass)) {
        header("Location: ../signup.php?error=Password is required&$user_data");
        exit();
    } else if (empty($re_pass)) {
        header("Location: ../signup.php?error=Re Password is required&$user_data");
        exit();
    } else if (empty($fname)) {
        header("Location: ../signup.php?error=Name is required&$user_data");
        exit();
    } else if (empty($lname)) {
        header("Location: ../signup.php?error=Name is required&$user_data");
        exit();
    } else if ($pass !== $re_pass) {
        header("Location: ../signup.php?error=The confirmation password  does not match&$user_data");
        exit();
    } else {

        // hashing the password
        $pass = md5($pass);

        $sql = "SELECT * FROM tbl_users WHERE user_name='$uname' ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            header("Location: ../signup.php?error=The username is taken try another&$user_data");
            exit();
        } else {
            $sql2 = "INSERT INTO tbl_users(first_name, last_name, `user_name`, `password`, `tel_no`, `id_no`, `gender`, `role`) 
                            VALUES( '$fname', '$lname', '$uname', '$pass', $tel_no, $id_no, '$gender', 2)";
            $result2 = mysqli_query($conn, $sql2);

            if ($result2) {
                header("Location: ../login.php?success=Your account has been created successfully");
                exit();
            } else {
                // echo $conn->error;
                header("Location: ../signup.php?error=unknown error occurred&$user_data");
                exit();
            }
        }
    }
} else {
    header("Location: ../signup.php");
    exit();
}
