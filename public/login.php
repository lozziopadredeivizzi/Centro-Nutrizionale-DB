<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/login.css">
    <link rel="stylesheet" href="../template/components/components.css">
    <title>Login - Centro Nutrizionale</title>
</head>
<?php require("../login.php") ?>
<body>
    <main>
        <section>
            <h1>
                Benvenuto
            </h1>
            <form action="#" method="post">
                <ul>
                    <li>
                        <label for="id">ID: </label>
                    </li>
                    <li>
                        <input type="text" name="id" id="id" required>
                    </li>
                    <li>
                        <label for="password">Password:</label>
                    </li>
                    <li>
                        <input type="password" name="password" id="password" required>
                    </li>
                    <li>
                        <button class="btn" type="submit" name="submitCliente">Accedi come cliente</button>
                    </li>
                    <li>
                        <button class="btn" type="submit" name="submitNutrizionista">Accedi come nutrizionista</button>
                    </li>
                    </li>
                </ul>
            </form>
            <p>Non possiedi ancora un account? <a href="signUp.html">Registrati</a></p>
        </section>
    </main>
</body>
</html>