<?php
require "app/resources/views/_header.view.php";
include 'app/includes/comment.inc.php';
include 'core/database/databasehandler.php';


$id = $_POST['id'];
$uid = $_POST['uid'];
$date = $_POST['date'];
$message = $_POST['message'];

echo "<form method='POST' action='".editComments($conn)."'>
    <input type='hidden' name='id' value='".$id."'>
    <input type='hidden' name='uid' value='".$uid."'>
    <input type='hidden' name='date' value='".$date."'>
    <textarea name='message'>".$message."</textarea><br>
    <button type='submit' name='commentSubmit'>Muokkaa</button>
</form>";
