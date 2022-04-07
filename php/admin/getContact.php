<?php
include '../../includes/db.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$off = $_GET['off'];

$stmt = $db->prepare("SELECT * FROM contact LIMIT 10 OFFSET $off");
$stmt->execute();
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($contacts as $key => $contact) {

    ?>
    <tr class="h-16 pr-8">
        <td class="">
            <ion-icon onclick="contactDetails(<?= $contact['id'] ?>)" class="text-center w-full"
                      name="eye-outline"></ion-icon>
        </td>
        <td class="text-center"><?= $contact['name'] ?></td>
        <td class="text-center"><?= $contact['date'] ?></td>
        <td class="text-center"><?= $contact['email'] ?></td>

        <td class="text-center" id="status_<?= $contact['id'] ?>">
            <?php
            switch ($contact['isAnswered']) {
                case 0:
                    echo '<span class="text-red-700">● </span>Pending';
                    break;
                case 1:
                    echo '<span class="text-green-700">● </span>Answered';
                    break;
            }

            ?>
        </td>
        <td class="text-center"><img src="../assets/images/logos/more-vertical.png" class="rounded bg-[#F1F3F9]"></td>
    </tr>

    <?php
}
?>
