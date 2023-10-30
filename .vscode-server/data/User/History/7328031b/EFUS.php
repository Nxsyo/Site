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
//var_dump($dataS);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tableau SQL</title>
	<link href="php.css" rel="stylesheet">
</head>
<body>
    <h1>tableau departements</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom du département</th>
        </tr>
        <?php foreach ($datas as $row): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['departement_nom']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>


