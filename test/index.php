<?php

require __DIR__ . '/vendor/autoload.php';

use testeemail\Email;

$novoEmail = new Email(2, "mail.host.com", "your@email.com", "your-pass", "smtp secure (tls/ssl)", "port (587)",
    "from@email.com", "From Name");

$novoEmail->sendMail( " Subject " , " Conteúdo " , " reply@email.com " , " Nome da Repetição " , " endereço@email.com " , " Nome do Endereço ");


        


