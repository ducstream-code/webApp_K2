<?php
include '../../includes/db.php';

if ($_COOKIE['role'] != 1) {
    header('location:https://www.aurelienk.space');
}

$stmt = $db->prepare("SELECT id, verified, email FROM clientscompanies WHERE id = :id ");
$stmt->execute(['id' => $_COOKIE['id']]);
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
<?php
if ($res['verified'] == 1) {
    ?>
    <div class="waiting_container">
        <div class="waiting_data">
            <h3>Nous allons revenir vers vous par email afin de proceder à des verification.</h3>
            <h4>Il se peut que certaines personnes cherchent a se faire passer pour des entreprises</h4>


            <button onclick="window.location='/includes/logout.php'">Se deconnecter</button>

        </div>

    </div>
    <?php include('../../includes/message.php'); ?>


    <?php
} elseif ($res['verified'] == 2) {
    ?>
    <div class="waiting_container">
        <div class="waiting_data">
            <h3>Désormais, afin que vos clients puissent profiter de nos offres et avantages, il est necessaire que vous
                payiez votre cotisation</h3>
            <h4>
                <a href="../../stripe/checkout.php">Passer au paiement<a>
            </h4>


            <button onclick="window.location='/includes/logout.php'">Se deconnecter</button>

        </div>
        <script>

        </script>
    </div>
    <?php include('../../includes/message.php'); ?>

    <?php
} elseif ($res['verified'] == 3) {

    include '../../includes/header_company.php' ?>
    <body>

<div class="container">
    <div class="stats">
    <div class="card">
        <div>
            <?php
            $stmt = $db->prepare("SELECT mailsent FROM clientscompanies WHERE id = :id");
            $stmt->bindParam(':id', $_COOKIE['id']);
            $stmt->execute();
            $nbMail = $stmt->fetch();
            ?>
            <div class="numbers"><?=$nbMail['mailsent']?></div>
            <div class="cardName">Mails envoyés</div>
        </div>
        <div class="iconBx">
            <ion-icon name="mail-outline"></ion-icon>
            </ion-icon></div>
    </div>

    <div class="card">
        <div>
            <?php
            $stmt = $db->prepare("SELECT id FROM users WHERE idReferer = :id");
            $stmt->bindParam(':id', $_COOKIE['id']);
            $stmt->execute();
            $nbRegister = $stmt->rowCount();
            ?>

            <div class="numbers"><?= $nbRegister ?></div>
            <div class="cardName">Membres inscrits</div>
        </div>
        <div class="iconBx">
            <ion-icon name="mail-open-outline"></ion-icon>
            </ion-icon></div>
    </div>
    <div class="card">
        <div>
            <?php
            $orders = 0;
            $stmt = $db->prepare("SELECT id FROM users WHERE idReferer = :id");
            $stmt->bindParam(':id', $_COOKIE['id']);
            $stmt->execute();
            $members = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($members as $key => $member) {
                $stmt = $db->prepare("SELECT id FROM orders WHERE id_customer = :cid");
                $stmt->bindParam(':cid', $member['id']);
                $stmt->execute();
                $nbOrder = $stmt->rowCount();
                $orders += $nbOrder;
            }

            ?>
            <div class="numbers"><?= $orders ?></div>
            <div class="cardName">Achats de membres</div>
        </div>
        <div class="iconBx">
            <ion-icon name="cart-outline"></ion-icon>
            </ion-icon></div>
    </div>
    <div class="card">
    <?php
    $stmt = $db->prepare("SELECT id FROM users WHERE idReferer = :id");
    $stmt->bindParam(':id', $_COOKIE['id']);
    $stmt->execute();
    $members = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $points = 0;
    foreach ($members as $key => $member) {
        $stmt = $db->prepare("SELECT solde FROM users WHERE id = :id");
        $stmt->bindParam(':id',$member['id']);
        $stmt->execute();
        $avPoints = $stmt->fetch();
        $points += $avPoints['solde'] ;
    }
    $endPoints = $points/$nbRegister


        ?>

        <div>
            <div class="numbers"><?= sprintf("%.2f", $endPoints)?></div>
            <div class="cardName">Points moyen</div>
        </div>
        <div class="iconBx">
            <ion-icon name="star-outline"></ion-icon>
            </ion-icon></div>
        </div>
        <!--
        <div class="card">
            <div>
                <div class="numbers">1,504</div>
                <div class="cardName">Visites</div>
            </div>
            <div class="iconBx">
                <ion-icon name="eye-outline"></ion-icon>
            </div>
        </div> -->

        </div>


        </div>


        <form action="../../php/companies/send_mails.php" method="post" enctype="multipart/form-data" id="send_mail">
            <h3>Ajouter des clients</h3>

            <label class="file">
                <input type="hidden" name="referrer" value="<?= $res['id'] ?>">
                <input type="file" name="fileToUpload" id="fileToUpload">

            </label>

            <button>Ajouter de clients</button>
            <button type="button" onclick="document.getElementById('send_mail').style.display='none'">Fermer</button>
        </form>


        <script>

        </script>
    <?php include('../../includes/message.php'); ?>
        </body>
        </html>
        <?php
    }
elseif
    ($res['verified'] == 0){
    ?>
    <div class="waiting_container">
        <form class="waiting_data" action="../../php/companies/send_mails.php" method="post"
              enctype="multipart/form-data">
            <h3>Veuillez verifier votre mail avant de continuer</h3>
            <input hidden name="email" value="<?= $res['email'] ?>">

            <button>Envoyer le mail</button>

        </form>
    </div>
    <?php include('../../includes/message.php'); ?>
    <?php
}
