<?php

include "../../includes/db.php";

$id_order = $_GET['id_order'];

$stmt = $db->prepare('SELECT * FROM ordered_procut WHERE id_order = :id_order');
$stmt->bindParam(':id_oder', $id_order);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


