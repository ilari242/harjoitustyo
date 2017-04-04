<?php
session_start();
include '../../core/database/databasehandler.php';

$first = $_POST['first'];
$last = $_POST['last'];
$uid = $_POST['uid'];
$password = $_POST['password'];

if (empty($first)){
    header("Location: ../../signup.php?error=empty");
    exit();
}
if (empty($last)){
    header("Location: ../../signup.php?error=empty");
    exit();
}
if (empty($uid)){
    header("Location: ../../signup.php?error=empty");
    exit();
}
if (empty($password)){
    header("Location: ../../signup.php?error=empty");
    exit();
}
else {
    $result = pg_query($conn, "SELECT uid FROM user WHERE uid='$uid';");
    $uidcheck = pg_num_rows($result);
    if ($uidcheck > 0) {
        header("Location: ../../signup.php?error=username");
        exit();
    } else {
        $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
        $result = pg_query($conn, "INSERT INTO user (first, last, uid, password) 
        VALUES ('$first', '$last', '$uid', '$encrypted_password');");
        echo "$first";
        //header("Location: ../../index.php");
    }
}



