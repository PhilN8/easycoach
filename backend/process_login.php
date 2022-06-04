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

if (isset($_POST['uname']) && isset($_POST['password'])) {

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: ../login.php?error=User Name is required");
        exit();
    } else if (empty($pass)) {
        header("Location: ../login.php?error=Password is required");
        exit();
    } else {
        // hashing the password
        $pass = md5($pass);


        $sql = "SELECT * FROM tbl_users WHERE user_name='$uname' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
                $_SESSION['name'] = $row['first_name'];
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['role'] = $row['role'];

                if ($row['role'] == 2)
                    header("Location:../homepage.php");
                else
                    header("Location:../admin.php");
            } else {
                header("Location: ../login.php?error=Incorrect User name or password");
                exit();
            }
        } else {
            header("Location: ../login.php?error=Incorect User name or password");
            exit();
        }
    }
}
