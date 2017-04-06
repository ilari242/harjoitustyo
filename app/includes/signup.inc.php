<?php
session_start();
include '../../core/database/databasehandler.php';

$first = pg_escape_string($conn, $_POST['first']);
$last = pg_escape_string($conn, $_POST['last']);
$uid = pg_escape_string($conn, $_POST['uid']);
$password = pg_escape_string($conn, $_POST['password']);

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
    $sql = "SELECT uid FROM usertable WHERE uid='$uid'";
    $result = pg_query($conn, $sql);
    $uidcheck = pg_num_rows($result);
    if ($uidcheck > 0) {
        header("Location: ../../signup.php?error=username");
        exit();
    } else {
        $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usertable (first, last, uid, password) 
        VALUES ('$first', '$last', '$uid', '$encrypted_password')";
        $result = pg_query($conn, $sql);
        header("Location: ../../index.php");
    }
}



