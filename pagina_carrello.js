document.addEventListener('DOMContentLoaded', (event) => {
    console.log('DOM completamente caricato e analizzato.');
    document.querySelectorAll('.button-rimuovi').forEach(button => {
        button.addEventListener('click', async (e) => {
            const id_prodotto = e.currentTarget.dataset.id;
            const prodottoElement = e.currentTarget.closest('.prodotto');

            console.log('Pulsante cliccato:', e.currentTarget);
            console.log('ID prodotto:', id_prodotto);

            if (id_prodotto && prodottoElement) {
                console.log(`Tentativo di rimuovere il prodotto con ID: ${id_prodotto}`);
                try {
                    let response = await fetch('rimuovi_dal_carrello.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: `id_prodotto=${id_prodotto}`,
                    });

                    let data = await response.text();
                    console.log('Risposta dal server:', data);

                    if (data.includes("Prodotto rimosso dal carrello!")) {
                        console.log('Elemento prodotto trovato:', prodottoElement);
                        alert('Prodotto rimosso dal carrello.');
                        prodottoElement.remove();
                    } else {
                        alert('Errore nel rimuovere il prodotto dal carrello: ' + data);
                    }
                } catch (error) {
                    console.error('Errore:', error);
                    alert('Errore nella richiesta: ' + error);
                }
            } else {
                console.log('ID prodotto non definito o elemento prodotto non trovato');
            }
        });
    });
});