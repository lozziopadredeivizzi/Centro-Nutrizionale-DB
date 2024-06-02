document.getElementById("selectNutrizionistaBtn").addEventListener("click", function () {
    if (confirm("Sei sicuro di voler scegliere questo nutrizionista?")) {
        var idNutrizionista = this.getAttribute("data-id");
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../scegliNutrizionista.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                window.location = "homepageCliente.php";
            }
        };
        xhr.send("idNutrizionista=" + idNutrizionista);
    }
});
