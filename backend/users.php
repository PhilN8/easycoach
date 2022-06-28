<?php

require_once 'db_conn.php';

$user_sql = 'SELECT * FROM tbl_users WHERE `is_deleted` = 0';
$result = $conn->query($user_sql);

if ($result->num_rows > 0) {
    while ($rows = $result->fetch_assoc()) {
        $user_records[] = $rows;
        $all_ids[] = $rows['user_id'];
    }
}

if (isset($_POST['users'])) {
    $result = $conn->query($user_sql);

    if ($result->num_rows > 0)
        while ($rows = $result->fetch_assoc())
            $allUsers[] = $rows;

    echo json_encode($allUsers);
}
