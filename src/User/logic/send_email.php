<?php
    require '../EmailSender.php';

    $emailTo = $_POST["email"];

    $sentResult = EmailSender::sendEmail($emailTo);

    // ovde treba da se promene lokacije...
    if($sentResult == "/"){
        header('Location: /');
        die();
    }

    session_start();
    $_SESSION["code_result"] = $sentResult;

    header('Location: /verify');
    die();

?>
