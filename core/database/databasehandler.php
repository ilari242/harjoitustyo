<?php
$conn = pg_connect("host=dbstud2.sis.uta.fi port=5432 dbname=il99590 user=il99590 password=kukka");

if (!$conn) {
    die("Connection failed: ". pg_result_error_field());
}
