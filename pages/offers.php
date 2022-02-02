<?php
include ('../includes/db.php');
include ('../includes/check_session.php');
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <link rel="stylesheet" href="/css/offers.css">
    <link rel="icon" type="image/png" href=""/>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
            crossorigin="anonymous"></script>



    <title>Nos offres</title>
</head>

<body>
<?php
include('../includes/message.php');
include ("../includes/header.php");
?>

<?php
$sql ="SELECT id,price,title,description,image FROM offers";
$stmt = $db->prepare($sql);
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo'<div class="offers_container">';
foreach ($res as $key => $offer_data) {
?>
    <div class="card" style="width: 18rem;">
        <img src="<?=$offer_data['image'] ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?=$offer_data['title'] ?></h5>
            <p class="card-text"><?=substr($offer_data['description'],0,100).'...'; ?></p>
            <a href="/pages/product?id=<?=$offer_data['id'] ?>" class="btn btn-primary">Voir l'offre</a>
        </div>
        <div class="card-footer">
            <small class="text-muted">Cout en point: <?=$offer_data['price'] ?></small>
        </div>
    </div>
</body>
</html>
<?php
}
/*
 *
 */
