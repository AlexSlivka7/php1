<?php 
if ($_SERVER["REQUEST_METHOD"]) {
  
}
print_r($_POST);
$cislo1 = $_POST["cislo1"];
$cislo2 = $_POST["cislo2"];
$operacia = $_POST["operacia"];
$vysledok = "";

if ($operacia === "+") {
    $vysledok = $cislo1 + $cislo2;
}
elseif ($operacia === "-") {
    $vysledok = $cislo1 - $cislo2;
}
elseif ($operacia === "*") {
    $vysledok = $cislo1 * $cislo2;
}
elseif ($operacia === "/") {
    if ($cislo2 == 0) {
        $vysledok = "Delenie nulou!";
    } else {
        $vysledok = $cislo1 / $cislo2;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post">
        <fieldset>
          <div class="mb-3">
            <label for="cislo1" class="form-label">Cislo 1</label>
            <input type="text" id="cislo1" class="form-control" name="cislo1">
          </div>
          
          <div class="mb-3">
            <label for="cislo2" class="form-label">Cislo 2</label>
            <input type="text" id="cislo2" class="form-control" name="cislo2">
          </div>
          
          <div class="mb-3">
            <label for="Select" class="form-label">Operácia</label>
            <select id="Select" class="form-select" name="operacia">
              <option>+</option>
              <option>-</option>
              <option>*</option>
              <option>/</option>
            </select>
          </div>
          <div class="button">
          <button type="submit" class="btn btn-primary">Submit</button>
          </div>
           
          <p>
            Výsledok:
            <?php echo $vysledok; ?>
          </p>
        </fieldset>
      </form>
</body>
</html>