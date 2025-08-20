<?php

class Carro {
    public $marca;
    public $modelo;
    public $ano;
    public $revisao;
    public $N_Donos;

    public function __construct($marca, $modelo, $ano, $revisao, $N_Donos) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
        $this->revisao = $revisao;
        $this->N_Donos = $N_Donos;
    }
}

$carro1 = new Carro("Porche", "911", 2020, false, 3);
$carro2 = new Carro("Mitshubishi", "Lancer", 1945, true, 1);

// Exercicio

$carro3 = new Carro("Fiat", "Uno", 2010, true, 2); // Objeto carro3
$carro4 = new Carro("BMW","320i",2022,false,1); // Objeto carro4
$carro5 = new Carro("Chevrolet","Camaro",2023,false,0); // Objeto carro5
$carro6 = new Carro("Ford","Mustang Mach 1",2025,true,1); // Objeto carro6

?>