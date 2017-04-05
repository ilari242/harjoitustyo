<?php
    date_default_timezone_set('Europe/Helsinki');
    require "_header.view.php";
    include "app/includes/comment.inc.php";
    include "core/database/databasehandler.php";
?>

    <?php
        // Katsotaan, onko käyttäjä kirjautunut.
        if (isset($_SESSION['id'])) {
            if(strlen($message) > 0): ?>
                <div class="feedback">
                    <?= $message; ?>
                </div>
            <?php endif;

            // Katsotaan, onko käyttäjä tyyppiä admin.
            if ($_SESSION['type'] == 1) {
            ?>
            <nav class="allUsers">
                <p class="allUsers-heading">
                    <br>
                    Muut käyttäjät:
                </p>
                <br>
                <?php foreach ($users as '$user'):?>
                    <?php if ($_SESSION['id'] != $user->id) {?>
                        <label class="panel-block">
                            <?= htmlspecialchars($user['first']); ?>
                            <?= htmlspecialchars($user['last']); ?>
                            <?= htmlspecialchars($user['id']); ?>
                            <br>
                            <?php if ($user->type != 1) {?>
                                [<a href="index.php?action=oikeudet&id=<?= $user->id; ?>">Anna adminin oikeudet</a>]
                            <?php }
                            else {?>
                                (admin)
                            <?php } ?>
                            - [<a class="poista" href="index.php?action=poistaUser&id=<?= $user->id; ?>">Poista käyttäjä</a>]
                        </label>
                        <br><br>
                    <?php }
                endforeach;?>
            </nav>
            <?php }

            // On käyttäjä kuka tahansa, tulostetaan tehtävälista ja oma profiili.?>
            <nav class="taskList">
                <p class="tasks-heading">
                    <br>
                    Tehtävälista:
                </p>
                <br>
                <?php foreach ($tasks as $task):?>
                    <label class="panel-block">
                        <input
                            type="checkbox"
                            disabled="disabled"
                            <?php if($task->completed) { echo ' checked="checked"'; } ?>
                        >
                        <?= htmlspecialchars($task->description); ?>
                        <?php if(!$task->completed): ?>
                            - [<a href="index.php?action=merkkaa&id=<?= $task->id; ?>">Merkkaa valmiiksi</a>]
                        <?php endif; ?>
                        - [<a class="poista" href="index.php?action=poista&id=<?= $task->id; ?>">Poista</a>] - <?= htmlspecialchars($task->duedate); ?>
                    </label>
                    <br>
                <?php endforeach;?>

                    <br><br><br>
                    <h1 class="title">Lisää uusi tehtävä</h1>
                    <br>
                    <div class="notification">
                        <form action="index.php" method="POST">
                            <label class="label" for="description">Anna kuvaus</label>
                            <p class="control">
                                <input class="input" type="text" id="description" name="description">
                            </p>
                            <label class="label" for="duedate">Anna määräaika</label>
                            <p class="control">
                                <input class="input" type="text" id="duedate" name="duedate">
                            </p>
                            <p class="control">
                                <input class="button is-primary" type="submit" value="Lisää uusi tehtävä">
                            </p>
                        </form>
                    </div><br>
            </nav>

            <nav class="profile">
                <p class="profile-heading">
                    <br>
                    Oma profiili:
                </p>
                <br>
                <?php foreach ($users as $user):?>
                    <label class="panel-block">
                        <?php if ($_SESSION['id'] == $user->id) {?>
                            <?= htmlspecialchars($user->first); ?>
                            <?= htmlspecialchars($user->last); ?>
                            <?= htmlspecialchars($user->uid); ?>
                            - [<a class="poista" href="index.php?action=poistaUser&id=<?= $user->id; ?>">Poista käyttäjä</a>]
                        <?php } ?>
                    </label>
                <?php endforeach;?>
            </nav>

            <div class="set-comment">
            <?php
                echo "<form method='POST' action='".setComments($conn)."'>
                    <input type='hidden' name='uid' value='".$_SESSION['id']."'>
                    <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                    <textarea name='message'></textarea><br>
                    <button type='submit' name='commentSubmit'>Kommentoi</button>
                </form>";
            ?>
            </div>

            <div class="all-comments">
            <?php
            getComments($conn);
            ?>
            </div>

        <?php } else {
            echo "Et ole kirjautunut!";
        }
    ?>


<?php
require "_footer.view.php";?>
