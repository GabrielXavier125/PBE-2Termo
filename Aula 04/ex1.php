<?php

    $marca_carro1 = "Honda";
    $modelo_carro1 = "Civic";
    $ano_carro1 = 2016;
    $revisao_carro1 = true;
    $donos_carro1 = 2;

    $marca_carro2 = "BMW";
    $modelo_carro2 = "320i";
    $ano_carro2 = 2012;
    $revisao_carro2 = false;
    $donos_carro2 = 3;

    $marca_carro3 = "Fiat";
    $modelo_carro3 = "Uno";
    $ano_carro3 = 2005;
    $revisao_carro3 = false;
    $donos_carro3 = 1;

    $marca_carro4 = "Volkswagem";
    $modelo_carro4 = "Jetta";
    $ano_carro4 = 2020;
    $revisao_carro4 = true;
    $donos_carro4 = 7;
 
    function exibircarro($marca,$modelo,$ano,$revisao,$donos) {
        echo "Marca: $marca, Modelo: $modelo, Ano: $ano, Revisão: " . ($revisao ? 'Sim' : 'Não') . ", Donos: $donos<br>";
    }
    exibircarro($marca_carro1,$modelo_carro1,$ano_carro1,$revisao_carro1,$donos_carro1);

?>