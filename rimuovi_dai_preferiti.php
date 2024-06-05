<?php

require_once 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!isset($_SESSION['id_user'])) {
        echo "Sessione utente non valida";
        exit;
    }

    $id_user = $_SESSION['id_user'];
    $id_prodotto = $_POST['id_prodotto'];

    $result = $conn->query("SELECT * FROM preferiti WHERE id_user = '$id_user' AND id_prodotto = '$id_prodotto'");
    if ($result->num_rows > 0) {
        $sql = "DELETE FROM preferiti WHERE id_user = '$id_user' AND id_prodotto = '$id_prodotto'";
        if ($conn->query($sql) === TRUE) {
            echo "Prodotto rimosso dai preferiti!";
        } else {
            echo "Errore durante la rimozione del prodotto dai preferiti: " . $conn->error;
        }
    } else {
        echo "ID del prodotto non presente nei preferiti";
    }
} else {
    echo "Metodo non valido";
}

$conn->close();
?>