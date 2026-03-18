<?php 

include "Kniha.php";
include "Database.php";

$spojenie = new Database();
$db = $spojenie ->nadviazSpojenie();

if (!$db) {
    die("Databaza nie pripojena");
}

$sql = "SELECT * FROM knihy";

$stmt = $db->query($sql);

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"]) && $_POST["action"] === "delete"){

    $sql = "DELETE FROM knihy WHERE id = :id";

    $stmt = $db->prepare($sql);

    return $stmt->execute([
        ":id" => $_POST["kniha_id"]
    ]);

    header("Location:index.php");
    exit();
}



while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
   $kniha = null;

   $kniha = new Kniha($row["nazov"], $row["autor"],(int)$row["rok_vydania"],(int)$row["stav"]);

   if($kniha){
    $kniha->setId($row["id"]);
    $kniznica[] = $kniha;
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabulka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
</head>
<body>
    <h1>Knižnica</h1>
    <br>
    <table border ="1">
        <tr>
            <th>Nazov</th>
            <th>Autor</th>
            <th>Rok vydania</th>
            <th>Stav</th>
            <th>Action</th>
        </tr>

            <?php foreach ($kniznica as $kniha):?>
                <tr>
                  <td>
                    <?= $kniha->getNazov();?>
                </td>
                <td>
                    <?= $kniha->getAutor();?>
                </td>
                <td>
                    <?= $kniha->getRok_vydania();?>
                </td>
                <td>
                    <?= $kniha->getStav();?>
                </td>
                <td>
                    <form action="index.php" method="POST">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="kniha_id" value="<?= $kniha->getId(); ?>" >
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach?>
    </table>
</body>
</html>