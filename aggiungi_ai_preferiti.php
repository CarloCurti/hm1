<?php
require_once 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    if (!isset($_SESSION['id_user'])) {
        echo "<script type='text/javascript'>alert('Effettuare il login prima di aggiungere l'elemento nei preferiti');</script>";
        exit;
    }
    
    $id_user = $_SESSION['id_user'];
    $id_prodotto = $_POST['id_prodotto'];

    if (!$id_prodotto) {
        echo "ID prodotto non definito";
        exit;
    }

    $sql = "INSERT INTO preferiti (id_user, id_prodotto) VALUES ('$id_user', '$id_prodotto')";
    if ($conn->query($sql) === TRUE) {
        echo "Prodotto aggiunto ai preferiti!";
    } else {
        echo "Errore: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Metodo non valido";
}

$conn->close();
?>
