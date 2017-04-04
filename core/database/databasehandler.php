<?php
//$conn = pg_connect("dbstud2.sis.uta.fi","5432", "il99590", "il99590", "password=kukka");
//$conn = mysqli_connect("localhost", "il99590", "Lyijykyna1", "il99590");
$conn = pg_connect("dbstud2.sis.uta.fi", "5432", "il99590", "kukka", "il99590");

if (!$conn) {
    die("Connection failed: ". pg_result_error_field());
    //die("Connection failed: ".mysqli_connect_error());
}
