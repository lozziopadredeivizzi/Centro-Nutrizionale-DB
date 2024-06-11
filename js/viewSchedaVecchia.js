document.querySelectorAll(".schede").forEach(function (article) {
    article.addEventListener("click", function () {
        const codScheda = this.getAttribute("data-codScheda");

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../impostaCodScheda.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                window.location = "vecchiaPrescrizione.php";
            }
        };
        xhr.send("codScheda=" + codScheda);
    });
});
