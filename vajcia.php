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
        <label for="pocet" >Pocet vajec: </label>
        <input type="text" id="pocet"  name="pocet" >
        <br>
        <button type="submit">Submit</button>
        </fieldset>
    </form>
</body>
</html>
<?php
$pocet = $_POST["pocet"];
for ($i=0; $i <$pocet ; $i++) { 
    echo "<img src='vajco.jpg'>";
}
?>