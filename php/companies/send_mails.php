<?php

// DISPLAY ERRORS
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../../includes/db.php');
$r = $_POST['referrer'];
$fileTmpPath = $_FILES['fileToUpload']['tmp_name'];
$fileName = $_FILES['fileToUpload']['name'];
$fileSize = $_FILES['fileToUpload']['size'];
$fileType = $_FILES['fileToUpload']['type'];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));
$mailSent = 0;

$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
$uploadFileDir = 'mail_lists/';
$dest_path = $uploadFileDir . $newFileName;

if(move_uploaded_file($fileTmpPath, $dest_path))
{
    $message ='File is successfully uploaded.';
}
else
{
    $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
}


/* read txt file, hash mail, and send mail*/

$handle = fopen('mail_lists/'.$newFileName = md5(time() . $fileName) . '.' . $fileExtension, "r");
echo 'ok';

if ($handle) {
    echo 'ok';

    while (($line = fgets($handle)) !== false) {
        $mailSent +=1;
        $exist = $db->prepare("SELECT email FROM register_mail WHERE email = :email");
        $exist->execute(['email' => rtrim($line)]);
        $doExist = $exist->rowCount();

        if ($doExist = 0) {

            $hash = hash('sha256', $line);
            $stmt = $db->prepare("INSERT INTO register_mail (email, hash) VALUES (:email, :hash)");
            $stmt->execute(['email' => rtrim($line), 'hash' => $hash]);
            echo 'ok';

            $message = '
Cher ' . $line . ',
Votre entreprise vous à inscris sur loyaltyCard!

Veuillez cliquer sur ce lien pour vérifier votre email et créer votre compte:
https://aurelienk.space/pages/client_register.php?email=' . rtrim($line) . '&hash=' . $hash . '&r=' . $r . '

';
            $headers = 'From:noreply@loyaltycard.fr' . "\r\n";
            mail($line, 'Inscription loyaltyCard', $message, $headers);


        }
    }
    fclose($handle);
} else {
    echo 'error';
}

//header('location: ../../../pages/company_admin/index.php');

?>
