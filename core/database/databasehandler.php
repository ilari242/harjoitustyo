<?php
$conn = pg_connect("host=dbstud2.sis.uta.fi","5432", "dbname=il99590", "user=il99590", "password=kukka");
//$conn = mysqli_connect("localhost", "il99590", "Lyijykyna1", "il99590");

if (!$conn) {
    die("Connection failed: ". pg_result_error_field());
    //die("Connection failed: ".mysqli_connect_error());
}
