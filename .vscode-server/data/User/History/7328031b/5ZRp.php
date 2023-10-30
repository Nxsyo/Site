<?php
echo "Connexion MySQL";

try {
    $db = new PDO(
        'mysql:host=localhost;dbname=BTS_Sofyan;charset=utf8',
        'sofyan',
        'plop'
    );
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}

$dataStatut = $db->prepare('SELECT * FROM departement');
$dataStatut->execute();
$datas = $dataStatut->fetchAll();
var_dump($datas);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Résultats de la requête</title>
</head>
<body>
    <h1>Résultats de la requête</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom du département</th>
        </tr>
        <?php foreach ($datas as $row): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nom']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>



