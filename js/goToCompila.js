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
        
        // Determina quale pagina aprire in base al testo del quinto elemento <li>
        switch(text) {
            case 'Completa':
                window.location.href = 'compilaCompleta.html';
                break;
            case 'Alimentare':
                window.location.href = 'compilaAlimentare.html';
                break;
            case 'Fisica':
                window.location.href = 'compilaFisica.html';
                break;
            default:
                // Se il testo non corrisponde a nessuna delle opzioni, non fare nulla
                break;
        }
    });
});
