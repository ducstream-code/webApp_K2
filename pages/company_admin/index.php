<?php
include '../../includes/db.php';

if ($_COOKIE['role']!=1){
    header('location:http://localhost:81/');
}

$stmt = $db->prepare("SELECT id FROM clientscompanies WHERE id = :id ");
$stmt->execute(['id'=>$_COOKIE['id']]);
$res = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <link rel="stylesheet" href="../../css/company_admin.css">
    <link rel="icon" type="image/png" href=""/>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <title>Section entreprise</title>
</head>
<?php include '../../includes/header_company.php'?>
<body>

<div class="container">
    <div class="stats">
        <div class="card">
            <div>
                <div class="numbers">1,504</div>
                <div class="cardName">Mails envoyés</div>
            </div>
            <div class="iconBx"><ion-icon name="mail-outline"></ion-icon></ion-icon></div>
        </div>
        <div class="card">
            <div>
                <div class="numbers">1,504</div>
                <div class="cardName">Mails reçus</div>
            </div>
            <div class="iconBx"><ion-icon name="mail-open-outline"></ion-icon></ion-icon></div>
        </div>
        <div class="card">
            <div>
                <div class="numbers">1,504</div>
                <div class="cardName">Membres inscrits</div>
            </div>
            <div class="iconBx"><ion-icon name="mail-open-outline"></ion-icon></ion-icon></div>
        </div>
        <div class="card">
            <div>
                <div class="numbers">1,504</div>
                <div class="cardName">Achats de membres</div>
            </div>
            <div class="iconBx"><ion-icon name="cart-outline"></ion-icon></ion-icon></div>
        </div>
        <div class="card">
            <div>
                <div class="numbers">1,504</div>
                <div class="cardName">Points moyen</div>
            </div>
            <div class="iconBx"><ion-icon name="star-outline"></ion-icon></ion-icon></div>
        </div>
        <div class="card">
            <div>
                <div class="numbers">1,504</div>
                <div class="cardName">Visites</div>
            </div>
            <div class="iconBx"><ion-icon name="eye-outline"></ion-icon></div>
        </div>

    </div>




</div>




<form action="../../php/companies/send_mails.php" method="post" enctype="multipart/form-data" id="send_mail">
    <h3>Ajouter des clients</h3>

    <label class="file">
        <input type="hidden" name="referrer" value="<?=$res['id']?>">
        <input type="file" name="fileToUpload" id="fileToUpload">

    </label>

    <button>Ajouter de clients</button>
    <button type="button" onclick="document.getElementById('send_mail').style.display='none'">Fermer</button>
</form>


<script>

</script>
</body>
</html>
