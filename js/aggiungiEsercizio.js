// Funzione per aggiungere un nuovo gruppo di input per un esercizio
function addExerciseGroup() {
    var lastGroup = document.querySelector('.exercise-group:last-of-type');
    var lastGroupId = lastGroup.getAttribute('data-group-id');
    var newGroupId = parseInt(lastGroupId) + 1;

    var newGroup = document.createElement('div');
    newGroup.classList.add('exercise-group');
    newGroup.setAttribute('data-group-id', newGroupId);

    newGroup.innerHTML = `
        <label for="exercise${newGroupId}">Nome Esercizio:</label>
        <select id="exercise${newGroupId}" name="exercise[]" required>
            <option value="esercizio1">Esercizio 1</option>
            <option value="esercizio2">Esercizio 2</option>
            <option value="esercizio3">Esercizio 3</option>
        </select>

        <label for="frequency${newGroupId}">Frequenza Settimanale:</label>
        <input type="text" id="frequency${newGroupId}" name="frequency[]" required>

        <label for="duration${newGroupId}">Durata:</label>
        <input type="text" id="duration${newGroupId}" name="duration[]" required>
    `;

    // Inserisci il nuovo gruppo sotto l'ultimo gruppo esistente
    lastGroup.parentNode.insertBefore(newGroup, lastGroup.nextSibling);
}

// Funzione per aggiungere un nuovo gruppo di input per un consiglio
function addAdviceGroup() {
    var lastGroup = document.querySelector('.advice-group:last-of-type');
    var lastGroupId = lastGroup ? lastGroup.getAttribute('data-group-id') : 0;
    var newGroupId = parseInt(lastGroupId) + 1;

    var newGroup = document.createElement('div');
    newGroup.classList.add('advice-group');
    newGroup.setAttribute('data-group-id', newGroupId);

    newGroup.innerHTML = `
        <label for="advice${newGroupId}">Consiglio ${newGroupId}:</label>
        <textarea id="advice${newGroupId}" name="advice[]" required></textarea>
        <button type="button" class="add-advice">Aggiungi Consiglio</button>
    `;

    // Inserisci il nuovo gruppo sotto l'ultimo gruppo esistente
    lastGroup.parentNode.insertBefore(newGroup, lastGroup.nextSibling);
}

// Funzione per aggiungere un nuovo consiglio ad un gruppo esistente
function addAdditionalAdvice(button) {
    var groupId = button.closest('.advice-group').getAttribute('data-group-id');
    var lastAdviceId = button.closest('.advice-group').querySelectorAll('textarea').length;
    var newAdviceId = lastAdviceId + 1;

    var newAdvice = document.createElement('div');
    newAdvice.innerHTML = `
        <label for="advice${groupId}-${newAdviceId}">Consiglio ${newAdviceId}:</label>
        <textarea id="advice${groupId}-${newAdviceId}" name="advice[${groupId}][]" required></textarea>
    `;

    button.parentNode.insertBefore(newAdvice, button);
}

// Aggiungi event listener per il pulsante "Aggiungi Esercizio"
document.addEventListener('click', function(event) {
    if (event.target && event.target.classList.contains('add-exercise')) {
        addExerciseGroup();
    }
});

// Aggiungi event listener per il pulsante "Aggiungi Consiglio"
document.addEventListener('click', function(event) {
    if (event.target && event.target.classList.contains('add-advice-group')) {
        addAdviceGroup(event.target);
    }
});

// Delega l'evento per gestire i pulsanti "Aggiungi Consiglio" nei gruppi esistenti
document.addEventListener('click', function(event) {
    if (event.target && event.target.classList.contains('add-advice')) {
        addAdditionalAdvice(event.target);
    }
});
