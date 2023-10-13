<?php

require_once __DIR__ . '/EmailSender.php';

$ES = EmailSender::sendEmail();
echo $ES;
