<?php

// DISPLAY ERRORS
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../../includes/db.php');


/* read txt file, hash mail, and send mail*/

$handle = fopen("text.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $hash = hash('sha256',$line);
        $stmt = $db->prepare("INSERT INTO register_mail (email, hash) VALUES (:email, :hash)");
        $stmt->execute(['email'=>rtrim($line), 'hash' =>$hash]);

        $message = '
Cher ' . $line . ',
Votre entreprise vous à inscris sur loyaltyCard!

Veuillez cliquer sur ce lien pour vérifier votre email et créer votre compte:
https://aurelienk.space/pages/client_register.php?email='.$line .'&hash='.$hash .'

';
        $headers = 'From:noreply@loyaltycard.fr' . "\r\n";
        mail($line, 'Inscription loyaktyCard', $message, $headers);

        echo $line;
    }

    fclose($handle);
} else {
    echo 'error';
}


?>
