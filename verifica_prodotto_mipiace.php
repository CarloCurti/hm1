<?php
require_once('config.php');
session_start();

if(!isset($_SESSION['id_user'])) {
    http_response_code(401);
    echo json_encode(array("error" => "Devi effettuare l'accesso per aggiungere o rimuovere prodotti dai preferiti."));
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['id']) || !isset($data['nome']) || !isset($data['prezzo']) || !isset($data['immagine'])) {
    http_response_code(400); // Bad Request
    echo json_encode(array("error" => "Dati del prodotto non completi."));
    exit;
}

$utente_id_api = $_SESSION['id_user'];
$id_prod_api = $conn->real_escape_string($data['id']);
$nome_prod_api = $conn->real_escape_string($data['nome']);
$prezzo_prod_api = $conn->real_escape_string($data['prezzo']);
$immagine_prod_api = $conn->real_escape_string($data['immagine']);

$sql_verifica = "SELECT id FROM mipiace WHERE utente_id_api = '$utente_id_api' AND nome_prod_api = '$nome_prod_api' LIMIT 1";
$result_verifica = $conn->query($sql_verifica);

if ($result_verifica && $result_verifica->num_rows > 0) {
    $sql_rimozione = "DELETE FROM mipiace WHERE utente_id_api = '$utente_id_api' AND nome_prod_api = '$nome_prod_api'";
    if ($conn->query($sql_rimozione) === TRUE) {
        echo json_encode(array("success" => true, "message" => "Prodotto rimosso dai preferiti con successo."));
    } else {
        http_response_code(500);
        echo json_encode(array("error" => "Errore durante la rimozione del prodotto dai preferiti: " . $conn->error));
    }
} elseif ($result_verifica) {
    $sql_aggiunta = "INSERT INTO mipiace (utente_id_api, id, nome_prod_api, prezzo_prod_api, immagine_prod_api) VALUES ('$utente_id_api', '$id_prod_api', '$nome_prod_api', '$prezzo_prod_api', '$immagine_prod_api')";
    if ($conn->query($sql_aggiunta) === TRUE) {
        echo json_encode(array("success" => true, "message" => "Prodotto aggiunto ai preferiti con successo."));
    } else {
        http_response_code(500);
        echo json_encode(array("error" => "Errore durante l'aggiunta del prodotto ai preferiti: " . $conn->error));
    }
} else {
    http_response_code(500);
    echo json_encode(array("error" => "Errore durante la verifica del prodotto: " . $conn->error));
}

$conn->close();
?>
