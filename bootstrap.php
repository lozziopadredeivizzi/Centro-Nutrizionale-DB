<?php
session_start();
require_once ("db/database.php");
$dbh = new DatabaseConnection("localhost", "root", "", "centronutrizionale", 3306);
?>