    <?php
// DISPLAY ERRORS
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include ('../../includes/db.php');

$stmt = $db->prepare("SELECT COUNT(id) as quantity, DAY(date) as day FROM orders WHERE YEAR(date) = YEAR(now()) AND MONTH(date) = MONTH(now()) GROUP BY date");
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

$array = array_fill(0,31,0);
foreach ($res as $key => $dateSort){
    $array[$dateSort['day']] = $dateSort['quantity'];
}


    echo json_encode(array_values($array));

