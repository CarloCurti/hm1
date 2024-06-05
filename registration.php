<?php
require_once('config.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $conn->real_escape_string($_POST['nome']);
    $cognome = $conn->real_escape_string($_POST['cognome']);
    $codice_postale = $conn->real_escape_string($_POST['codice_postale']);
    $giorno = $conn->real_escape_string($_POST['giorno']);
    $mese = $conn->real_escape_string($_POST['mese']);
    $anno = $conn->real_escape_string($_POST['anno']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $conferma_password = $conn->real_escape_string($_POST['conferma_password']);

    if ($password !== $conferma_password) {
        $_SESSION['error'] = "Le password non combaciano";
        header("Location: registration.php");
        exit();
    }

    $duplicate_query = $conn->query("SELECT * FROM login WHERE email = '$email'");

    if ($duplicate_query && $duplicate_query->num_rows > 0) {
        $_SESSION['error'] = "Email già utilizzata";
        header("Location: registration.php");
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $hashed_confpass = password_hash($conferma_password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO login (nome, cognome, codice_postale, giorno, mese, anno, email, password, conferma_password) 
            VALUES ('$nome', '$cognome', '$codice_postale', '$giorno', '$mese', '$anno', '$email', '$hashed_password', '$hashed_confpass')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");

    } else {
        $_SESSION['error'] = "Errore durante la registrazione utente: " . $conn->error;
    }

    exit();
}
?>




<html lang="en" dir="ltr">
    <head>
        <link rel="stylesheet" href="registration.css">
        <script src="registration.js" defer></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>Registrazione</title>
    </head>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <body>
        <header>
            <img src="immagini per html\images.png" id="img-header">
        </header>

        <main>
            <h2>Registrati a FLX</h2>
            <div id="dettagli">
                <h3>Dettagli dell'account</h3>
                <form class="" action="registration.php" method="POST" autocomplete="off" id="form_js">
                    <div id="identità">                
                        <label for="nome">Nome
                            <input type="text" name="nome" id="nome" required value="">
                        </label>
                        <div id="id-cognome">
                            <label for="cognome">Cognome
                                <input type="text" name="cognome" id="cognome" required value="">
                            </label>
                        </div>
                    </div>
                    <div id="identità1">
                        <div id="id-cod">
                            <label for="codice_postale">Codice postale
                                <input type="text" name="codice_postale" id="codice_postale" required value="">
                            </label>
                        </div>
                        <div id="data">
                            <label for="giorno">Data di nascita
                                <input type="number" name="giorno" id="giorno" required value="" placeholder="gg" min="1" max="31">
                            </label>
                            
                            <label for="mese">
                                <input type="number" name="mese" id="mese" required value="" placeholder="mm" min="1" max="12">
                            </label>

                            <label for="anno">
                                <input type="number" name="anno" id="anno" required value="" placeholder="aaaa" min="1900">
                            </label>
                        </div>
                    </div>
                    <select name = "sesso" id = "sesso">
                        <option value="seleziona">Seleziona</option>
                        <option value="uomo">Uomo</option>
                        <option value="donna">Donna</option>
                        <option value="altro">Altro</option>
                    </select>
                    <div id="credenziali">
                        <h4>Credenziali dell'account</h4>
                        <div id="cred1">
                            <label for="email">E-mail
                                <input type="email" name="email" id="email" required value="">
                            </label>
                            <div id="cred1-pass">
                                <label for="password">Password
                                    <input type="password" name="password" id="password" required value="">
                                </label>
                                <img src="immagini per html\password_nascosta.png" id="pass_nascosta">
                            </div>
                        </div>
                        <div id="confpass-mobile">
                            <label for="conferma_password">Conferma password
                                <input type="password" name="conferma_password" id="conferma_password" required value="">                            
                            </label>
                            <img src="immagini per html\password_nascosta.png" id="pass_nascosta_conf">
                        </div>
                        <div id="opzioni">
                            <div>
                                <input type="checkbox" name="informazioni[]" value="0_20" class="op">Sì, voglio ricevere e-mail dal programma FLX con offerte e premi sclusivi.
                            </div>
                            <div>
                                <input type="checkbox" name="informazioni[]" value="20" class="op">Sì, voglio iscrivermi alle e-mail di Foot Locker su nuovi arrivi, campagne di saldi e prodotti stagionali.
                            </div>
                        </div>
                        <button type="submit" name="submit" id="button-mobile">Registrati</button>
                    </div>
                </form>
            </div>
            <a id="link-login" href="login.php">Clicca qui se possiedi già un account FLX</a>
        </main>

        <footer>

            <div id="contenitore-bottoni-footer">
                <div class="button-mobile">
                    <button class="link-footer" href="">Aiuto</button>
                    <button class="link-footer" href="">Stato dell'ordine</button>
                </div>
                <div class="button-mobile">
                    <button class="link-footer" href="">Spedizioni</button>
                    <button class="link-footer" href="">Resi & Rimborsi</button>
                </div>
            </div>

        </footer>
    </body>
</html>