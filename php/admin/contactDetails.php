<?php
include '../../includes/db.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$id = $_GET['id'];

$stmt = $db->prepare("SELECT * FROM contact WHERE id = :id");
$stmt->bindParam(':id',$id);
$stmt->execute();
$details = $stmt->fetch();
?>
<div class="flex justify-between ">
        <h1 class="font-semibold text-white text-xl"><?=$details['email']?></h1>
        <button class="text-white font-semibold text-xl" onclick="closeDetails()">Close</button>
    </div>
    <hr class="mt-4">
    <h1 class="mt-5 text-white text-2xl font-bold mb-4">Message:</h1>
    <div class="w-full bg-gray-400 h-24 rounded pr-2 pl-2">
        <p><?=$details['message']?></p>
    </div>
    <div class="flex mt-4 justify-between ">
        <a class="rounded bg-white border-solid border-[2px] border-[#7764E4] p-2 text-[#7764E4] hover:bg-[#7764E4] hover:text-white w-24" href="mailto:<?=$details['email']?>">Répondre</a>
        <button class="rounded bg-white border-solid border-[2px] border-green-400 p-2 text-gray-400 hover:bg-green-400 hover:text-white  text-center" onclick="noteRead(<?=$details['id']?>)">Répondu</button>
    </div>
