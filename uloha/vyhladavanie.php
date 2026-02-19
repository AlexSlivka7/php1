
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
    <fieldset>
    <label for="Meno">Meno:</label>
    <input type="text" name="Meno">
    <br>
    <label for="Priezvisko">Priezvisko:</label>
    <input type="text" name="Priezvisko" >
    <br>
    <button type="submit" name="hladat">Hľadať</button>
    </fieldset>
</form>

<a href="register.php">
    <button type="button">Späť na registráciu</button>
</a>
<br>
</body>
</html>
<?php
if(isset($_POST["hladat"])) {

    $Meno = trim($_POST["Meno"]);
    $Priezvisko = trim($_POST["Priezvisko"]);

    $riadky = @file("uzivatelia.txt");
    if(!$riadky) $riadky = [];

    $najdeny = false;

    foreach($riadky as $riadok) {
        $udaje = explode(";", $riadok);
        $meno = trim($udaje[0]);
        $priezvisko = trim($udaje[1]);

        if($Meno && !$Priezvisko && $meno === $Meno) {
            echo "Meno: $meno, Priezvisko: $priezvisko, Pohlavie: $udaje[2], Vzdelanie: $udaje[3]<br>";
            $najdeny = true;
        } elseif($Meno && $Priezvisko && $meno === $Meno && $priezvisko === $Priezvisko) {
            echo "Meno: $meno, Priezvisko: $priezvisko, Pohlavie: $udaje[2], Vzdelanie: $udaje[3]<br>";
            $najdeny = true;
        }
        elseif ($Priezvisko && !$Meno && $priezvisko === $Priezvisko) {
            echo "Meno: $meno, Priezvisko: $priezvisko, Pohlavie: $udaje[2], Vzdelanie: $udaje[3]<br>";
            $najdeny = true;
        }
    }

    if(!$najdeny) echo "Používateľ sa nenašiel.";
}
/*print_r($udaje);*/
?>
