<?php

function setComments($conn) {
    if (isset($_POST['commentSubmit'])) {
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $message = $_POST['message'];

        $sql = "INSERT INTO comment (uid, date, message) VALUES ('$uid', '$date', '$message')";
        $result = pg_query($conn, $sql);
        //$result = mysqli_query($conn, $sql);
    }
}

function getComments($conn) {
    $sql = "SELECT * FROM comment";
    $result = pg_query($conn, $sql);
    while($row = $result->fetch_assoc()){
        $id = $row['uid'];
        $sql2 = "SELECT * FROM user WHERE id = '$id'";
        $result2 = pg_query($conn, $sql2);
        if ($row2 = $result2->fetch_assoc())
        echo "<div class='comment-box'><p>";
        echo $row2['uid']."<br>";
        echo $row['date']."<br>";
        echo nl2br($row['message']);
        echo "</p>";
        if ($_SESSION['id'] == $row2['id'] || $_SESSION['type'] == 1) {
            echo "<form class='delete-form'method='POST' action='delete_comment.php'>
                <input type='hidden' name='id' value='" . $row['id'] . "'>
                <button>Poista</button>
            </form>";
        }
        if ($_SESSION['id'] == $row2['id']) {
            echo "<form class='edit-form'method='POST' action='edit_comment.php'>
                <input type='hidden' name='id' value='".$row['id']."'>
                <input type='hidden' name='uid' value='".$row['uid']."'>
                <input type='hidden' name='date' value='".$row['date']."'>
                <input type='hidden' name='message' value='".$row['message']."'>
                <button>Muokkaa</button>
            </form>";
        }
        echo "</div>";
    }
}

function editComments($conn) {
    if (isset($_POST['commentSubmit'])) {
        $id = $_POST['id'];
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $message = $_POST['message'];

        $sql = "UPDATE comment SET message='$message' WHERE id='$id'";
        $result = pg_query($conn, $sql);
        header("Location: index.php");
    }
}

function deleteComments($conn) {
    if (isset($_POST['commentDelete'])) {
        $id = $_POST['id'];

        $sql = "DELETE FROM comment WHERE id='$id'";
        $result = pg_query($conn, $sql);
        header("Location: index.php");
    }
    else if (isset($_POST['undo'])){
        header("Location: index.php");
    }
}

