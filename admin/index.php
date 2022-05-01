<?php
// DISPLAY ERRORS
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include '../includes/db.php';

$uid = $_COOKIE['id'];
$stmt = $db->prepare("SELECT id FROM admin WHERE id_member = :id ");
$stmt->bindParam(":id",$uid);
$stmt->execute();
$res = $stmt->fetch();

if(!$res){
    header('Location : ../index.php');
}

//compte nb Membres
$stmt = $db->prepare("SELECT id FROM users");
$stmt->execute();
$nbMember = $stmt->rowCount();

//compte nb Entreprises
$stmt = $db->prepare("SELECT id FROM clientscompanies");
$stmt->execute();
$nbCompany = $stmt->rowCount();

//nb Ventes

$stmt = $db->prepare("SELECT id FROM orders WHERE status = 1");
$stmt->execute();
$nbOrders = $stmt->rowCount();

//Calcul chiffre d'affaire
$stmt = $db->prepare("SELECT total FROM orders WHERE status = 1");
$stmt->execute();
$calcTot = $stmt->fetchAll(PDO::FETCH_ASSOC);
$total = 0;
foreach ($calcTot as $key => $tot){

    $total += $tot['total'];
}



?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <?php include '../includes/head.php'?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <title>Panel administrateur</title>
</head>

<body id="body">
<div class="container  flex  h-screen pr-16">
    <?php include "../includes/sidebar.php";
    ?>
    <div class="main left-16">

        <div class="topbar z-20">
            <h3>Panel administrateur</h3>
            <div class="actions">

            </div>
        </div>
        <div class="wrap pt-20 ">
            <div class="cardBox">
                    <div class="card">
                        <div>
                            <div class="numbers"><?=$total ?>$</div>
                            <div class="cardName">Chiffre d'affaire</div>
                        </div>
                        <div class="iconBx"><ion-icon name="eye-outline"></ion-icon></div>
                    </div>
                    <div class="card">
                        <div>
                            <div class="numbers"> <?=$nbOrders ?></div>
                            <div class="cardName">Ventes</div>
                        </div>
                        <div class="iconBx"><ion-icon name="cart-outline"></ion-icon></ion-icon></div>
                    </div>
                    <div class="card">
                        <div>

                            <div class="numbers"><?= $nbCompany ?></div>
                        <div class="cardName">Entreprises</div>
                        </div>
                        <div class="iconBx"><ion-icon name="cash-outline"></ion-icon></ion-icon></div>
                    </div>
                    <div class="card">
                        <div>
                            <div class="numbers"><?=$nbMember ?></div>
                            <div class="cardName">Membres</div>
                        </div>
                        <div class="iconBx"><ion-icon name="person-add-outline"></ion-icon></ion-icon></div>
                    </div>
                </div>

        </div>
        <div class="wrap flex">
            <div class="graph_container h-96 bg-white w-3/5 mr-4">
                <canvas id="myChart" style="width:95%"></canvas>
            </div>
            <div class="todayDatas w-2/6 place-content-around h-96 bg-white"
        </div>
    </div>
</div>



<script>



    const req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState === 4) {
            const data = req.response;

            var xValues = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31];
            var yValues = JSON.parse(data)
            let max= Math.max(...yValues)*1.5
            console.log(max)
            new Chart("myChart", {
                type: "line",
                data: {
                    labels: xValues,
                    datasets: [{
                        fill: false,
                        lineTension: 0,
                        backgroundColor: "rgba(0,0,255,1.0)",
                        borderColor: "rgba(0,0,255,0.1)",
                        data: yValues
                    }]
                },
                options: {
                    legend: {display: false},
                    scales: {
                        yAxes: [{ticks: {min: 0, max:max}}],
                    }
                }
            });


        }
    };
    req.open('GET', '../php/admin/get_sells.php');
    req.send();



</script>

</body>
</html>
