<?php
if(isset($_POST["Meno"])) {

    $Meno = $_POST["Meno"];
    $Priezvisko = $_POST["Priezvisko"];
    $Pohlavie = $_POST["Pohlavie"];
    $Vzdelanie = $_POST["Vzdelanie"];

    if(file_exists("uzivatelia.txt")) {
        $riadky = file("uzivatelia.txt");
    } else {
        $riadky = [];
    }
    
    $existuje = false;

    foreach($riadky as $riadok) {
        $udaje = explode(";", $riadok);
        if(trim($udaje[0]) === $Meno && trim($udaje[1]) === $Priezvisko) {
            $existuje = true;
            break;
        }
    }

    if(!$existuje) {
        $súbor = fopen("uzivatelia.txt", "a");
        fwrite($súbor, $Meno . ";" . $Priezvisko . ";" . $Pohlavie . ";" . $Vzdelanie . "\n");
        fclose($súbor);
        echo "<p>Používateľ uložený!</p>";
    } else {
        echo "<p>Používateľ s týmto menom a priezviskom už existuje!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrácia</title>
</head>
<body>
    <form method="post">
        <fieldset>

            <label for="Meno">Meno:</label>
            <input type="text" name="Meno" id="Meno" required>
            <br>

            <label for="Priezvisko">Priezvisko:</label>
            <input type="text" name="Priezvisko" id="Priezvisko" required>
            <br>

            <label for="Pohlavie">Muž</label>
            <input type="radio" name="Pohlavie" value="Muž" required>
            <br>

            <label for="Pohlavie">Žena</label>
            <input type="radio" name="Pohlavie" value="Žena">
            <br>

            <select name="Vzdelanie" id="Vzdelanie">
                <option value="Základná škola">Základná škola</option>
                <option value="Stredná škola">Stredná škola</option>
                <option value="Vysoká škola">Vysoká škola</option>
            </select>
            <br>

            <button type="submit">Odoslať</button>
        </fieldset>
    </form>
    <a href="vyhladavanie.php">
    <button type="button">Prejsť na vyhľadávanie</button>
</a>
</body>
</html>
