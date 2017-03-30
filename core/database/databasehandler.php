<?php

$conn = mysqli_connect("localhost", "homestead", "secret", "homestead");

if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}
