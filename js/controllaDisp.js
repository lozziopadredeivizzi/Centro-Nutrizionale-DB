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
            if (xhr.responseText === 'disponibile') {
                availabilityMessage.classList.remove('hidden');
            } else {
                availabilityMessage.textContent = "La data e l'ora scelta non sono disponibili";
                availabilityMessage.classList.remove('hidden');
            }
        }
    };
    xhr.send('data=' + encodeURIComponent(data) + '&orario=' + encodeURIComponent(orario));
});

