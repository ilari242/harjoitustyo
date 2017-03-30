<?php
require "app/resources/views/_header.view.php";
include 'app/includes/comment.inc.php';
include 'core/database/databasehandler.php';


$id = $_POST['id'];
?>

<div class="delete-div">
    <p class="delete-p">Haluatko varmasti poistaa kommentin?</p><br>
    <?php echo "<form class='delete-comment-page'method='POST' action='".deleteComments($conn)."'>
        <input type='hidden' name='id' value='".$id."'>
        <button type='submit' name='commentDelete'>Poista</button>
        <button type='submit' name='undo'>Peruuta</button>
    </form>"; ?>
</div>