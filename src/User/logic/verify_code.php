<?php

require __DIR__ . "/../EmailSender.php";

session_start();
$generatedCode = $_SESSION["code_result"];

$userCode = $_POST["code"];
if($generatedCode !== $userCode){
    header('Location: /verify?error=distinct-code');
    die();
}

header('Location: /update');
die();

