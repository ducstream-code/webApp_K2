<?php

//connexion a la base de donnée
try {
    $db = new PDO('mysql:host=localhost:3306;dbname=loyaltycard', 'rooter', 'l66zi~3N', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

?>
