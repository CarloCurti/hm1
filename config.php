<?php

$host = "localhost";
$user = "prova";
$password = "";
$db = "hw_db";

$conn = new mysqli($host, $user, $password, $db);

if ($conn === false) {
    die("Errore durante la connessione");
}