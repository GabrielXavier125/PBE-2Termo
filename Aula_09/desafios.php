<?php

interface Forma {
    public function calcularArea($medida1, $medida2);
}

class Quadrado implements Forma {
    public function calcularArea($medida1, $medida2) {
        $area = $medida1 * $medida2;
        $areaFormatada = number_format($area, 2);
        return "A área do quadrado é: $areaFormatada. ";
    }
}

class Circulo implements Forma {
    public function calcularArea($medida1, $medida2) {
        $area = pi() * $medida1 * $medida2;
        $areaFormatada = number_format($area, 2);
        return "A área do círculo é: $areaFormatada. ";
    }
}

class Pentagono implements Forma {
    public function calcularArea($medida1, $medida2) {
        $area = (5 * $medida1 * $medida2) / 2;
        $areaFormatada = number_format($area, 2);
        return "A área do pentágono é: $areaFormatada. ";
    }
}

class Hexagono implements Forma {
    public function calcularArea($medida1, $medida2) {
        $area = (3 * sqrt(3) * pow($medida1, 2)) / 2;
        $areaFormatada = number_format($area, 2);
        return "A área do hexágono é: $areaFormatada. ";
    }
}

$quadrado = new Quadrado();
$circulo = new Circulo();
$pentagono = new Pentagono();
$hexagono = new Hexagono();

echo $quadrado->calcularArea(5, 5);
echo $circulo->calcularArea(3, 3);
echo $pentagono->calcularArea(3, 4);
echo $hexagono->calcularArea(2, 0);

?>
