// Funzione per aggiungere un nuovo gruppo di input per un alimento
function addFoodGroup() {
    var lastGroup = document.querySelector('.input-group:last-of-type');
    var lastGroupId = lastGroup.getAttribute('data-group-id');
    var newGroupId = parseInt(lastGroupId) + 1;

    var newGroup = document.createElement('div');
    newGroup.classList.add('input-group');
    newGroup.setAttribute('data-group-id', newGroupId);

    newGroup.innerHTML = `
        <label for="meal${newGroupId}">Pasto:</label>
        <select id="meal${newGroupId}" name="meal[]" required>
            <option value="colazione">Colazione</option>
            <option value="pranzo">Pranzo</option>
            <option value="cena">Cena</option>
            <option value="spuntino">Spuntino</option>
        </select>

        <label for="prescribed${newGroupId}">Alimento:</label>
        <select id="prescribed${newGroupId}" name="prescribed[]" required>
            <option value="alimento_prescritto1">Alimento Prescritto 1</option>
            <option value="alimento_prescritto2">Alimento Prescritto 2</option>
            <option value="alimento_prescritto3">Alimento Prescritto 3</option>
        </select>

        <label for="grams${newGroupId}">Quantità:</label>
        <input type="number" id="grams${newGroupId}" name="grams[]" required>

        <div class="optional-group">
            <label for="optional${newGroupId}-1">Alimento Opzionale 1:</label>
            <select id="optional${newGroupId}-1" name="optional[${newGroupId}][]" required>
                <option value="alimento1">Alimento 1</option>
                <option value="alimento2">Alimento 2</option>
                <option value="alimento3">Alimento 3</option>
            </select>
            <button type="button" class="add-optional">Aggiungi Alimento Opzionale</button>
        </div>
    `;

    // Inserisci il nuovo gruppo sotto l'ultimo gruppo esistente
    lastGroup.parentNode.insertBefore(newGroup, lastGroup.nextSibling);
}

// Funzione per aggiungere un nuovo gruppo di input per un alimento opzionale
function addOptionalGroup(button) {
    var groupId = button.closest('.input-group').getAttribute('data-group-id');
    var lastOptionalId = button.closest('.input-group').querySelectorAll('.optional-group select').length;
    var newOptionalId = lastOptionalId + 1;

    var newOptional = document.createElement('div');
    newOptional.innerHTML = `
        <label for="optional${groupId}-${newOptionalId}">Alimento Opzionale ${newOptionalId}:</label>
        <select id="optional${groupId}-${newOptionalId}" name="optional[${groupId}][]" required>
            <option value="alimento1">Alimento 1</option>
            <option value="alimento2">Alimento 2</option>
            <option value="alimento3">Alimento 3</option>
        </select>
    `;

    var optionalGroup = button.closest('.optional-group');
    optionalGroup.insertBefore(newOptional, button);
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

// Aggiungi event listener per il pulsante "Aggiungi Consiglio"
document.addEventListener('click', function(event) {
    if (event.target && event.target.classList.contains('add-advice')) {
        addAdditionalAdvice(event.target);
    }
});

// Aggiungi event listener per i pulsanti
document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.add-group').addEventListener('click', addFoodGroup);

    // Delega l'evento per gestire i pulsanti "Aggiungi Alimento Opzionale"
    document.addEventListener('click', function(event) {
        if (event.target && event.target.classList.contains('add-optional')) {
            addOptionalGroup(event.target);
        }
    });

    // Aggiungi event listener per il pulsante "Aggiungi Consiglio"
    document.querySelector('.add-advice').addEventListener('click', addAdviceGroup);
});
