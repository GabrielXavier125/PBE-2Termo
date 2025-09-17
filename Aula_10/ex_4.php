<?php
namespace Aula_10;

class Email {
    public function enviar() {
        return "Enviando email...";
    }
}

class Sms {
    public function enviar() {
        return "Enviando SMS...";
    }
}

function notificar($meio) {
    if (method_exists($meio, 'enviar')) {
        echo $meio->enviar() . PHP_EOL;
    } else {
        echo "O objeto não possui o método enviar()." . PHP_EOL;
    }
}

// Testes
$email = new Email();
$sms = new Sms();

notificar($email);
notificar($sms);

?>