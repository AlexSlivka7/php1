<?php

print_r($_GET);
$cislo1 = isset($_GET["cislo1"]);
$cislo2 = isset($_GET["cislo2"]);
$operacia = isset($_GET["operacia"]);
echo "<br>";

if ($operacia === "+") {
    echo $cislo1 + $cislo2;
}
elseif($operacia === "-") {
    echo $cislo1 - $cislo2;
}
elseif ($operacia === "*") {
    echo $cislo1 * $cislo2;
}
elseif ($operacia === "/") {
    
    if ($cislo2 == 0) {
        echo "Delenie nulou";
    }
    else {
        echo $cislo1 / $cislo2;
    }
    
} 


?>