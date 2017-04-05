<?php
session_start();
include '../../core/database/databasehandler.php';

$uid = pg_escape_string($conn, $_POST['uid']);
$password = pg_escape_string($conn, $_POST['password']);
$sql = "SELECT * FROM usertable WHERE uid='$uid'";
$result = pg_query($conn, $sql);
$row = pg_fetch_assoc($result);
$hash_password = $row['password'];
$hash = password_verify($password, $hash_password);

if ($hash == 0){
    header("Location: ../../index.php?error=empty");
    exit();
} else {
    $sql = "SELECT * FROM usertable WHERE uid='$uid' AND password='$hash_password'";
    $result = pg_query($conn, $sql);

    if (!$row = pg_fetch_assoc($result)) {
        echo "Käyttäjänimi tai salasana on väärin!";
    } else {
        $_SESSION['id'] = $row['id'];
        $_SESSION['type'] = $row['type'];
    }

    header("Location: ../../index.php");
}
