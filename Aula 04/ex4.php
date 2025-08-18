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

function calcularValor($marca, $ano, $Ndonos) {
    // Define o preço base de acordo com a marca
    switch ($marca) {
        case "BMW":
        case "Fiat":
            $preco_base = 300000;
            break;
        case "Volkswagem":
            $preco_base = 70000;
            break;
        case "Honda":
            $preco_base = 150000;
            break;
        default:
            $preco_base = 0; // Marca desconhecida
    }

    // Calcula a depreciação por ano
    $ano_atual = date("Y");
    $anos_de_uso = $ano_atual - $ano;
    $depreciacao_ano = $anos_de_uso * 3000;

    // Calcula a depreciação por número de donos além do primeiro
    $depreciacao_donos = 0;
    if ($Ndonos > 1) {
        $depreciacao_donos = ($Ndonos - 1) * 0.05;
    }

    // Aplica depreciações
    $valor_final = $preco_base - $depreciacao_ano;
    $valor_final -= $valor_final * $depreciacao_donos;

    // Evita valor negativo
    return max($valor_final, 0);
}

// Cálculo e exibição dos valores
echo "Valor estimado do $marca_carro1 $modelo_carro1: R$ " . number_format(calcularValor($marca_carro1, $ano_carro1, $donos_carro1), 2, ',', '.') . "\n";
echo "Valor estimado do $marca_carro2 $modelo_carro2: R$ " . number_format(calcularValor($marca_carro2, $ano_carro2, $donos_carro2), 2, ',', '.') . "\n";
echo "Valor estimado do $marca_carro3 $modelo_carro3: R$ " . number_format(calcularValor($marca_carro3, $ano_carro3, $donos_carro3), 2, ',', '.') . "\n";
echo "Valor estimado do $marca_carro4 $modelo_carro4: R$ " . number_format(calcularValor($marca_carro4, $ano_carro4, $donos_carro4), 2, ',', '.') . "\n";
?>