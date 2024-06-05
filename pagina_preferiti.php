<?php
require_once 'config.php';
session_start();

if (!isset($_SESSION['id_user'])) {
    echo "<script type='text/javascript'>alert('Effettuare il login prima di accedere ai preferiti')</script>";
    header("Location: index.php");
    exit;
}

$id_user = $_SESSION['id_user'];

$sql = "SELECT p.*
        FROM preferiti pf
        JOIN prodotto p ON pf.id_prodotto = p.id_prodotto
        WHERE pf.id_user = $id_user";

$result = $conn->query($sql);
$prodotti_preferiti = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $prodotti_preferiti[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Preferiti</title>
        <link rel="stylesheet" href="pagina_preferiti.css">
        <script src="pagina_preferiti.js" defer></script>
    </head>

    <body>

        <header>
            <img src="immagini per html/images.png" id="img-header">
        </header>

        <h1>I miei preferiti</h1>
        <div id="preferiti-catalogo">
            <?php if (count($prodotti_preferiti) > 0): ?>
                <?php foreach ($prodotti_preferiti as $prodotto): ?>
                    <div class="prodotto">
                        <img class="img-prodotto" src="data:image/jpeg;base64,<?php echo base64_encode($prodotto['immagine']); ?>" alt="<?php echo $prodotto['nome']; ?>">
                        <span class="nome-prodotto"><?php echo $prodotto['nome']; ?></span>
                        <span class="prezzo-prodotto">€<?php echo $prodotto['prezzo']; ?></span>
                        <div class="bottoni-catalogo">
                            <button class="button-cuore" data-id="<?php echo $prodotto['id_prodotto']; ?>"><img class="img-cuore" src="immagini per html/cuore.png" alt="Preferiti"></button>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Non hai ancora aggiunto nessun prodotto ai preferiti.</p>
            <?php endif; ?>
        </div>

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
