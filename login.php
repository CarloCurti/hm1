<?php

require_once 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['password']);

        $sql_select = "SELECT * FROM login WHERE email = '$email'";
        if ($result = $conn->query($sql_select)) {
            if ($result->num_rows == 1) {
                $row = $result->fetch_array(MYSQLI_ASSOC);
                if (password_verify($password, $row['password'])) {
                    $_SESSION['id_user'] = $row['ID'];

                    $_SESSION['email'] = $row['email'];
                    $_SESSION['nome'] = $row['nome'];

                    header("location: index.php");
                    exit();
                    
                } else {
                    echo "La password non è corretta";
                }
            } else {
                echo "Non ci sono account con questa e-mail";
            }
        } else {
            echo "Errore in fase di login";
        }
    } else {
        echo "Per favore, inserisci sia l'email che la password";
    }
}

$conn->close();