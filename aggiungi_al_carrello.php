<?php

require_once('config.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    if (!isset($_SESSION['id_user'])) {
        echo json_encode(["status" => "error", "message" => "Effettuare il login prima di aggiungere l'elemento nel carrello"]);
        exit;
    }

    $id_user = mysqli_real_escape_string($conn, $_SESSION['id_user']);
    $id_prodotto = mysqli_real_escape_string($conn, $_POST['id_prodotto']);
    $quantità = mysqli_real_escape_string($conn, $_POST['quantità']);

    if (!$id_prodotto || !$quantità) {
        echo json_encode(["status" => "error", "message" => "ID prodotto o quantità non definito"]);
        exit;
    }

    $result = $conn->query("SELECT * FROM prodotto WHERE id_prodotto = '$id_prodotto'");
    if ($result->num_rows > 0) {
        $prodotto = $result->fetch_assoc();
        $nome_prodotto = mysqli_real_escape_string($conn, $prodotto['nome']);
        $prezzo_tot = mysqli_real_escape_string($conn, $prodotto['prezzo'] * $quantità);

        $check_cart = $conn->query("SELECT * FROM cart WHERE utente = '$id_user' AND idprodotto = '$id_prodotto'");
        if ($check_cart->num_rows > 0) {
            $cart_item = $check_cart->fetch_assoc();
            $new_quantità = $cart_item['quantità'] + $quantità;
            $new_prezzo_tot = $prodotto['prezzo'] * $new_quantità;
            $sql = "UPDATE cart SET quantità = '$new_quantità', prezzo_tot = '$new_prezzo_tot' WHERE utente = '$id_user' AND idprodotto = '$id_prodotto'";
        } else {
            $sql = "INSERT INTO cart (utente, idprodotto, nome_prodotto, quantità, prezzo_tot) VALUES ('$id_user', '$id_prodotto', '$nome_prodotto', '$quantità', '$prezzo_tot')";
        }

        if ($conn->query($sql) === TRUE) {
            echo json_encode(["status" => "success", "message" => "Prodotto aggiunto al carrello!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Errore: " . $sql . "<br>" . $conn->error]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Prodotto non trovato"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Metodo non valido"]);
}

$conn->close();
?>
