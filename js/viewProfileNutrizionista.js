document.querySelectorAll(".result").forEach(function (div) {
    div.addEventListener("click", function () {
        const nutrizionistaId = this.getAttribute("data-id");

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../profileNutriz.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                window.location = "profiloNutrizionista.php";
            }
        };
        xhr.send("IDNutrizionista=" + nutrizionistaId);
    });
});
