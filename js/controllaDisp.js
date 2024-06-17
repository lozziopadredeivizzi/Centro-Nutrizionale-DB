document.getElementById('controllaDisp').addEventListener('click', function () {
    // Ottieni i dati necessari dalla form
    var data = document.getElementById('data').value;
    var orario = document.getElementById('orario').value;

    // Invia una richiesta AJAX al server per verificare la disponibilità
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../verificaDisp.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var availabilityMessage = document.getElementById('availabilityMessage');
            console.log(xhr.responseText);
            if (xhr.responseText === 'disponibile') {
                availabilityMessage.innerHTML = 'La data e l\'ora scelta sono disponibili <button class="btn" type="submit" id="prenota" name="prenota">Prenota</button>';

            } else if (xhr.responseText === 'La data di inizio non può essere minore della data attuale.') {
                availabilityMessage.textContent = "La data inserita non è valida, riporva."
            } else if (xhr.responseText === 'L\'orario di inizio non è valido, riporva.') {
                availabilityMessage.textContent = "L'orario di inizio non è consentita, riprova."
            } else {
                availabilityMessage.textContent = "La data e l'ora scelta non sono disponibili";
            }
        }
    };
    xhr.send('data=' + encodeURIComponent(data) + '&orario=' + encodeURIComponent(orario));
});

