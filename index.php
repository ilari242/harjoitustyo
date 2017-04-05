<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "core/App.php";
require "app/models/Task.php";
require "app/models/User.php";
require "core/database/connection.php";
require "core/database/QueryBuilder.php";

App::bind('config', require 'core/config.php');

App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));

$message = '';

// Käyttäjä lähetti lomakkeen tiedot

if(isset($_POST['description']))
{
    // Tarkistetaan, että tehtävällä on kuvaus.
    if(strpos($_POST['description']) < 0) {
        $message = 'Anna tehtävälle kuvaus ja määräaika.';
    // Tarkistetaan, että päivämäärä on 1111.1.1 tai 1111.01.01 tai 1111.01.1 tai 1111.1.01
    } else if(!preg_match('/^\d{4}\.\d{1,2}\.\d{1,2}$/', $_POST['duedate'])) {
        $message = 'Anna määräaika muodossa yyyy.mm.dd';
    // Tarkistelut tehty, lisätään rivi kantaan
    } else {
        App::get('database')
            ->query('INSERT INTO todo (id, description, completed, duedate) VALUES (
                    default, :description, 0, :duedate)')
            ->bind(':description', $_POST['description'])
            ->bind(':duedate', $_POST['duedate'])
            ->execute();
    }
}

if(isset($_GET['action']))
{
    switch ($_GET['action']) {
        case 'merkkaa':
            if(isset($_GET['id']) && is_numeric($_GET['id'])) {
                App::get('database')
                    ->query('UPDATE todo SET completed = 1 WHERE id = :id')
                    ->bind(':id', $_GET['id'])
                    //->bind(':completed', true)
                    ->execute();
                $message = "Tehtävä merkattu valmiiksi.";
            } else {
                $message = "Pyynnöstä puuttui kelvollinen id";
            }
            break;

        case 'oikeudet':
            if(isset($_GET['id']) && is_numeric($_GET['id'])) {
                App::get('database')
                    ->query('UPDATE usertable SET type = 1 WHERE id = :id')
                    ->bind(':id', $_GET['id'])
                    //->bind(':type', true)
                    ->execute();
                $message = "Käyttäjälle luovutettu adminin oikeudet.";
            } else {
                $message = "Pyynnöstä puuttui kelvollinen id";
            }
            break;

        case 'poista':
            if(isset($_GET['id']) && is_numeric($_GET['id'])) {
                App::get('database')
                    ->query('DELETE FROM todo WHERE id = :id')
                    ->bind(':id', $_GET['id'])
                    ->execute();
                $message = "Tehtävä poistettu.";
            } else {
                $message = "Pyynnöstä puuttui kelvollinen id";
            }
            break;

        case 'poistaUser':
            if(isset($_GET['id']) && is_numeric($_GET['id'])) {
                App::get('database')
                    ->query('DELETE FROM usertable WHERE id = :id')
                    ->bind(':id', $_GET['id'])
                    ->execute();
                $message = "Käyttäjä poistettu.";
            } else {
                $message = "Pyynnöstä puuttui kelvollinen id";
            }
            break;

        default:
            $message = "Tuntematon toiminto. Käytä ['merkkaa', 'poista'].";
            break;

    }
}

$tasks = App::get('database')
    ->query('SELECT * FROM todo')
    ->getAll('Task');

$usertables = App::get('database')
    ->query('SELECT * FROM usertable')
    ->getAll('User');

require 'app/resources/views/index.view.php';
