<?php
namespace Aula_10;

class Calculadora {

    public function somar() {
        $numArgs = func_num_args();
        $args = func_get_args();

        if ($numArgs == 2) {
            return $args[0] + $args[1];
        } elseif ($numArgs == 3) {
            return $args[0] + $args[1] + $args[2];
        } else {
            return "Número de argumentos inválido. Use 2 ou 3 números.";
        }
    }
}

$calc = new Calculadora();

echo $calc->somar(5, 10) . "\n";      
echo $calc->somar(1, 2, 3) . "\n";
echo $calc->somar(4) . "\n";

?>