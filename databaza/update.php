<?php 
include "Kniha.php";
include "Database.php";

$spojenie = new Database();
$db = $spojenie->nadviazSpojenie();


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"]) && $_POST["action"] === "update") {
    
    $sql = "UPDATE knihy 
            SET nazov = :nazov, 
                autor = :autor, 
                rok_vydania = :rok_vydania, 
                stav = :stav
            WHERE id = :id";

    $stmt = $db->prepare($sql);

    $stmt->execute([
        ":id" => $_POST["id"],
        ":nazov" => $_POST["nazov"],
        ":autor" => $_POST["autor"],
        ":rok_vydania" => $_POST["rok_vydania"],
        ":stav" => $_POST["stav"]
    ]);

    header("Location: index.php");
    exit(); 
}

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


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<form method="post" action="">
    <fieldset>
        <legend>Update</legend>

        <input type="hidden" name="action" value="update">
        <input type="hidden" name="id" value="<?= $kniha ? $kniha->getId() : '' ?>">

        <label>Názov</label><br>
        <input type="text" name="nazov" value="<?= $kniha ? $kniha->getNazov() : ''?>"><br>

        <label>Autor</label><br>
        <input type="text" name="autor" value="<?= $kniha ? $kniha->getAutor() : ''?>"><br>

        <label>Rok vydania</label><br>
        <input type="text" name="rok_vydania" value="<?= $kniha ? $kniha->getRok_vydania() : ''?>"><br>

        <label>Stav</label><br>
        <select name="stav">
            <option value="1" <?= ($kniha && $kniha->getStav() == 1) ? 'selected' : '' ?>>Dostupná</option>
            <option value="0" <?= ($kniha && $kniha->getStav() == 0) ? 'selected' : '' ?>>Požičaná</option>
        </select><br><br>

        <button class="btn btn-success" type="submit">Odoslať</button>
        <button class="btn btn-success" type="submit">Späť</button>

    </fieldset>
</form>

</body>
</html>