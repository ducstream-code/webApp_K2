<?php
include '../../includes/db.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);




$offset = $_GET['offset'];

$stmt = $db->prepare("SELECT id FROM discounts LIMIT 8 OFFSET $offset");
$stmt->execute();
$count = $stmt->rowCount();

$offset = $_GET['offset'];

if($offset <= 0 ){
    $offset = 0;
}



$stmt = $db->prepare("SELECT briev_description, store_image FROM discounts LIMIT 8 OFFSET $offset");
$stmt->execute();
$offers = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($offers as $key => $offer){
    ?>

    <div class="offer">
        <img src="<?=$offer['store_image'] ?>">
        <hr>
        <?=$offset?>
        <h3><?=$offer['briev_description'] ?></h3>
    </div>
    <?php
}


?>


