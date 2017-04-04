<?php require "app/resources/views/_header.view.php"; ?>

<?php

    $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    if (strpos($url, 'error=empty') !== false) {
        echo "Täytä kaikki kentät!";
    }
    else if (strpos($url, 'error=username') !== false) {
        echo "Käyttäjänimi on jo olemassa! Valitse uusi käyttäjänimi.";
    }
    if (isset($_SESSION['id'])) {
        echo "Olet jo kirjautuneena!";
    } else {
        echo "<form action='app/includes/signup.inc.php' method='POST'>
            <input type='text' name='first' placeholder='Firstname'>
            <input type='text' name='last' placeholder='Lastname'>
            <input type='text' name='uid' placeholder='Username'>
            <input type='password' name='password' placeholder='Password'>
            <button type='submit'>REKISTERÖIDY</button>
        </form>";
    }
?>


<?php require "app/resources/views/_footer.view.php"; ?>
