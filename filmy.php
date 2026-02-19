<?php
$pole = [
    "Rambo1" => [
        "žáner" =>"akčné",
        "hlavná postava" =>"Silverter Stallone",
        "rok vydania" =>1982,
    ],

    "Pelíšky" => [
        "žáner" =>"komédia",
        "hlavná postava" =>"Miroslav Donutil",
        "rok vydania" =>1999,
    ],

    "Interstellar" =>[
        "žáner" =>"Sci-fi",
        "hlavná postava" =>"Mathew McConaughey",
        "rok vydania" =>2014,
    ],
];
print_r($pole);
echo "<br>";


    



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
            <div>
            <label for="film" >Názov filmu: </label>
            <input type="text" id="film"  name="film" >
            </div>
            <label for="Akčný">Akčný</label>
            <input type="radio"  name="zaner" value = "akčné"> <br>
            
            <label for="Komédia">Komédia</label>
            <input type="radio"  name="zaner" value = "komédia"> <br>
            
            <label for="Sci-fi">Sci-fi</label>
            <input type="radio"  name="zaner" value = "Sci-fi"> <br>
            
            <button type="submit">Submit</button>
        </fieldset>
    </form>
</body>
</html>
<?php 

$film = $_POST["film"];
$zaner = $_POST["zaner"];
$vypis = "";
foreach ($pole as $key => $value) 
{
    if ($key == $film & $value["žáner"] === $zaner) 
    {
         $vypis .= $key . "<br>";

        foreach ($value as $vlastnost => $udaj) 
        {
            $vypis .= $vlastnost . ": " . $udaj . "<br>";
        }
        
        
    }
} 
if ($vypis != "") {
    echo $vypis;
} else {
    echo "Zadaný film neexistuje.";
}

?>
