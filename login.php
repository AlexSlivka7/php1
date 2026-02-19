<?php
$Meno = $_POST["Meno"];
$Heslo = $_POST["Heslo"];
if ($Meno === "" || $Heslo === "") {
    echo "Nebola zadané heslo alebo meno";
}
else{
    if(mb_strlen($Heslo) >= 5)
    {
        if ($Heslo === "NBU123") {
            echo "Vitaj admin";
        } else {
            echo "Neznámy uživateľ";
        }
    }
    else {
        echo "Musi byť aspoň 5 znakov";
    }
}
?>
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
            <legend>Login</legend>
        <label for="Meno" >Meno: </label>
        <input type="text" id="Meno"  name="Meno" >
        <br>
        <label for="Heslo" >Heslo: </label>
        <input type="password" id="Heslo"  name="Heslo" >
        <br>
        <button type="submit">Prihlásiť sa</button>
        </fieldset>
    </form>
</body>
</html>

