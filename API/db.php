<?php
try {
    $db = new PDO('mysql:host=152.228.218.3:3306;dbname=loyaltycard', 'rooter', 'U8bg^86j', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}