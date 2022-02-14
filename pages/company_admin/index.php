<?

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
https://aurelienk.space/page?email='. $line . '&hash='. $hash . '

';
        $headers = 'From:noreply@loyaltycard.fr' . "\r\n";
        mail($line, 'Inscription loyaktyCard', $message, $headers);

        echo $line;
    }

    fclose($handle);
} else {
    // error opening the file.
}

//envoie mail de verification:
/*
$message = '
Cher ' . $_POST['username'] . ',
Merci de vous être inscrit.e sur Loyalty Card!

Veuillez cliquer sur ce lien pour vérifier votre email:
http://127.0.0.1:81/php/verify_email.php?email='. $_POST['email'] . '&hash='. $hash . '

';
$headers = 'From:noreply@loyaltycard.fr' . "\r\n";
mail($_POST['email'], 'Inscription | Verification', $message, $headers);
*/

?>
