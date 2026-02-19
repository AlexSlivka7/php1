


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
        <label for="riadok" >Pocet riadkov: </label>
        <input type="text" id="riadok"  name="riadok" >
        <br>
        <label for="stlpec" >Pocet stlpcov: </label>
        <input type="text" id="stlpec"  name="stlpec" >
        <br>
        <label for="farby">Farby</label>
        <select name="farby">
              <option value = "black">Čierna</option>
              <option  value = "blue">Modrá</option>
              <option value = "green">Zelená</option>
              <option value = "red">Červená</option>
        </select>
    <br>
        <button type="submit">Submit</button>
        </fieldset>
    </form>
</body>
</html>
<?php
$riadky = $_POST["riadok"] ;
$stlpce = $_POST["stlpec"] ;
$farby = $_POST["farby"];

if ($riadky > 0 && $stlpce > 0) {

    echo "<table border='1'>";

    for ($a = 0; $a < $riadky; $a++) {
        echo "<tr>";
        for ($b = 0; $b < $stlpce; $b++) {
            if (($a + $b) % 2 == 0) {
                $bg = $farby;
            }
            else {
                $bg = "white";
            }
            echo "<td height='10px'  width='10px'  bgcolor= '$bg'></td>";
        }
        echo "</tr>";
    }

    echo "</table>";
}
/*echo $farby;*/

?>