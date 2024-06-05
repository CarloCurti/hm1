<?php
require_once 'config.php';
session_start();

if (!isset($_SESSION['id_user'])) {
    echo "<script type='text/javascript'>alert('Effettuare il login prima di accedere al carrello')</script>";
    header("Location: index.php");
    exit;
}

$id_user = $_SESSION['id_user'];

$sql = "SELECT c.*, p.nome, p.prezzo, p.immagine
        FROM cart c
        JOIN prodotto p ON c.idprodotto = p.id_prodotto
        WHERE c.utente = $id_user";

$result = $conn->query($sql);
$prodotti_carrello = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $prodotti_carrello[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Carrello</title>
        <link rel="stylesheet" href="pagina_carrello.css">
        <script src="pagina_carrello.js" defer></script>
    </head>

    <body>

        <header>
            <img src="immagini per html\images.png" id="img-header">
        </header>

        <h1>Il mio carrello</h1>
        <div id="carrello-catalogo">
            <?php if (count($prodotti_carrello) > 0): ?>
                <?php foreach ($prodotti_carrello as $prodotto): ?>
                    <div class="prodotto">
                        <img class="img-prodotto" src="data:image/jpeg;base64,<?php echo base64_encode($prodotto['immagine']); ?>" alt="<?php echo $prodotto['nome']; ?>">
                        <span class="nome-prodotto"><?php echo $prodotto['nome']; ?></span>
                        <span class="prezzo-prodotto">€<?php echo $prodotto['prezzo']; ?></span>
                        <span class="quantità-prodotto">Quantità: <?php echo $prodotto['quantità']; ?></span>
                        <span class="prezzo-totale-prodotto">Totale: €<?php echo $prodotto['prezzo'] * $prodotto['quantità']; ?></span>
                        <div class="bottoni-catalogo">
                            <button class="button-rimuovi" data-id="<?php echo $prodotto['idprodotto']; ?>">Rimuovi dal carrello</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Non hai ancora aggiunto nessun prodotto al carrello.</p>
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
