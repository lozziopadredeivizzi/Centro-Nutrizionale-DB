<?php

require_once ("bootstrap.php");

if (isUserLoggedIn()) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Gestione degli alimenti
        $idCliente = $_SESSION["idCliente"];
        $idNutrizionista = $_SESSION["id"];
        $obiettivo = $_POST["obiettivo"];
        $meals = $_POST['meal'];
        $prescribed = $_POST['prescribed'];
        $grams = $_POST['grams'];
        $optionals = $_POST['optional'];
        $optionalGrams = $_POST['optional-grams'];
        $durata = $_POST["durata"];

        $dbh->updateSchedaInfo($idCliente, $idNutrizionista, $durata, $obiettivo);
        $dbh->addTabellaAlimenti($idCliente, $idNutrizionista);

        foreach ($meals as $index => $meal) {
            $mealName = $meal;
            $prescribedFood = $prescribed[$index];
            $gramsAmount = $grams[$index];
            $dbh->addAlimentoPrescritto($prescribedFood, $gramsAmount, $idCliente, $idNutrizionista, $mealName);

            // Gestione degli alimenti opzionali
            if (isset($optionals[$index + 1])) {
                $optionalFoods = $optionals[$index + 1];
                $optionalGramsAmount = $optionalGrams[$index + 1] ?? [];

                foreach ($optionalFoods as $optionalIndex => $optionalFood) {
                    $optionalFoodName = $optionalFood;
                    $optionalGramAmount = $optionalGramsAmount[$optionalIndex] ?? 0;

                    if ($optionalFoodName !== '/') {
                        error_log($optionalGramAmount);
                        $dbh->addAlimentoOpzionale($prescribedFood, $gramsAmount, $mealName, $optionalFoodName, $optionalGramAmount, $idCliente, $idNutrizionista);
                    }
                }
            }
        }

        // Gestione dei consigli
        if (!empty($_POST['advice'])) {
            // Funzione per appiattire un array multidimensionale
            function flatten_array($array) {
                $result = array();
                foreach ($array as $element) {
                    if (is_array($element)) {
                        $result = array_merge($result, flatten_array($element));
                    } else {
                        $result[] = $element;
                    }
                }
                return $result;
            }
        
            $advices = flatten_array($_POST['advice']);
        
            if (trim($advices[0]) !== "") {
                $dbh->addTabellaConsigli($idCliente, $idNutrizionista);
            }
        
            foreach ($advices as $advice) {
                $adviceText = trim($advice);
                if ($adviceText !== "") {
                    $dbh->addConsiglio($adviceText, $idCliente, $idNutrizionista);
                }
            }
        }
        


        $dbh->updateConsulenza($idCliente, $idNutrizionista);
        header("Location: public/homepageNutrizionista.php");
    }
} else {
    header("Location: public/login.php");
}


?>