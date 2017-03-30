<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Harjoitustyo</title>
	<link rel="stylesheet"  type="text/css" href="style.php">
</head>
<body>
<p class="panel-heading">
    Harjoitustyö - Ilari Lehtonen
</p>
<p class="panel-heading">
    Kotityöt
</p>
<header>
    <nav>
        <ul>
            <li><a href="index.php">ETUSIVU</a></li>
            <?php
                if (isset($_SESSION['id'])) {
                    echo "<form action='app/includes/logout.inc.php'>
                        <button>KIRJAUDU ULOS</button>
                    </form>";
                } else {
                    echo "<form action='app/includes/login.inc.php' method='POST'>
                    <input type='text' name='uid' placeholder='Username'>
                    <input type='password' name='password' placeholder='Password'>
                    <button type='submit'>KIRJAUDU SISÄÄN</button>
                </form>";
                }
            ?>
            <li><a href="signup.php">REKISTERÖIDY</a></li>
        </ul>
    </nav>
</header>

