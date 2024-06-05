<?php
require_once 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!isset($_SESSION['id_user'])) {
        echo json_encode(["status" => "error", "message" => "Sessione utente non valida"]);
        exit;
    }

    $id_user = $_SESSION['id_user'];
    $id_prodotto = $_POST['id_prodotto'];

    $id_user = mysqli_real_escape_string($conn, $id_user);
    $id_prodotto = mysqli_real_escape_string($conn, $id_prodotto);

    $result = $conn->query("SELECT * FROM cart WHERE utente = '$id_user' AND idprodotto = '$id_prodotto'");
    if ($result->num_rows > 0) {
        echo json_encode(["status" => "exists"]);
    } else {
        echo json_encode(["status" => "not_exists"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Metodo non valido"]);
}

$conn->close();
?>
