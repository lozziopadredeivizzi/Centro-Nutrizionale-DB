<?php
session_start();
require_once ("db/database.php");
require_once ("utils/functions.php");
$dbh = new DatabaseConnection("localhost", "root", "", "centronutrizionale", 3306);
?>