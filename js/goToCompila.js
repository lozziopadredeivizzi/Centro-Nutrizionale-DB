// Seleziona tutti gli elementi <ul> con la classe "result"
var lists = document.querySelectorAll('.result');

// Itera su ciascun elemento <ul>
lists.forEach(function(list) {
    // Ottieni il quinto elemento <li> all'interno di questo <ul>
    var fifthLi = list.querySelector('li:nth-child(5)');
    
    // Ottieni il bottone all'interno di questo <ul>
    var button = list.querySelector('.btn');
    
    // Aggiungi un listener per il click sul bottone
    button.addEventListener('click', function() {
        // Ottieni il testo del quinto elemento <li>
        var text = fifthLi.textContent.trim();
        
        // Ottieni l'attributo data-idCliente
        var idCliente = list.getAttribute('data-idCliente');
        
        // Esegui la chiamata AJAX
        $.ajax({
            url: '../impostaCliente.php',
            method: 'POST',
            data: { idCliente: idCliente },
            success: function(response) {
                // Gestisci la risposta dal server se necessario
                switch(text) {
                    case 'Completa':
                        window.location.href = 'compilaCompleta.php';
                        break;
                    case 'Alimentare':
                        window.location.href = 'compilaAlimentare.php';
                        break;
                    case 'Fisica':
                        window.location.href = 'compilaFisica.php';
                        break;
                    default:
                        // Se il testo non corrisponde a nessuna delle opzioni, non fare nulla
                        break;
                }
            },
            error: function(xhr, status, error) {
                // Gestisci eventuali errori
            }
        });
    });
});
