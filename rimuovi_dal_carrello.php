<?php
require_once 'config.php';
session_start();

if (!isset($_SESSION['id_user'])) {
    echo "Utente non loggato";
    exit;
}

$id_user = $_SESSION['id_user'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_prodotto'])) {
    $id_prodotto = intval($_POST['id_prodotto']);

    $sql = "DELETE FROM cart WHERE utente = $id_user AND idprodotto = $id_prodotto";

    if ($conn->query($sql) === TRUE) {
        echo "Prodotto rimosso dal carrello!";
    } else {
        echo "Errore nel rimuovere il prodotto dal carrello. Error: " . $conn->error;
    }
} else {
    echo "Richiesta non valida.";
}

$conn->close();
?>
