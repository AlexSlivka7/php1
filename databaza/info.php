<?php
include "Kniha.php";
include "Database.php";

$spojenie = new Database();
$db = $spojenie->nadviazSpojenie();

$kniha = null;

if (isset($_GET["id"])) {
    $stmt = $db->prepare("SELECT * FROM knihy WHERE id = :id");
    $stmt->execute([":id" => $_GET["id"]]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $kniha = new Kniha($row["nazov"], $row["autor"], $row["rok_vydania"], $row["stav"]);
        $kniha->setId($row["id"]);
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"]) && $_POST["action"] === "spat") {
     
    header("Location: index.php");
     exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Informácie ku knihe:</h1>
    <div class="info">

    <div>Názov: <?= $kniha ? $kniha->getNazov() : ''?></div>
    <div>Autor: <?= $kniha ? $kniha->getAutor() : ''?></div>
    <div>Rok vydania: <?= $kniha ? $kniha->getRok_vydania() : ''?></div>
    <div>Stav: <?= $kniha ? ($kniha->getStav() === 1 ? "Dostupná" : "Požičaná") : '' ?></div>
    
    <form action="" method="post">
        <input type="hidden" name="action" value="spat">
        <button class="btn btn-success" type="submit">Späť</button>
    </form>

    </div>
</body>
</html>