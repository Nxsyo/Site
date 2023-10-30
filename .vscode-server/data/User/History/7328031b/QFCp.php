<?php

echo"Connexion MySQL \n ";
try {
        $db = new PDO (
                'mysql:host=localhost;dbname=BTS_Sofyan;charset=utf8',
                'sofyan',
                'plop'
        );
}

catch (Exception $e) {
        die("Erreur : ".$e->getMessage());
}
echo"\n";
$dataStatut = $db->prepare('SELECT * FROM departement');
$dataStatut->execute();
$datas=$dataStatut->fetchAll();
var_dump($datas);

?>