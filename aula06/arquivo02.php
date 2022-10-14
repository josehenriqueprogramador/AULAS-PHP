<?php 
// MANIPULAÇÃO DE ARRAY 
// Criando array 

$cores = array("Azul", "Verde", "Vermelho");
//print_r($cores);
$carros = array(3=>"Gol", 2=>"Palio", 1=>"Fiesta");
//print_r($carros);
$nomes[8] = "Maria";
$nomes[] = "João";
$nomes[] = "Pedro";
//print_r($nomes);
unset($nomes[9]);
//print_r($nomes);

// Arrays associativos
$pessoa['Nome'] = "Bruno";
$pessoa['Rua'] = "Guarapes";
$pessoa['Bairro'] = "Praça Seca";
$pessoa['Cidade'] = "Rio de Janeiro";

// Array multidimensionais
$carros = array('Palio'=>array('Cor'=>'Azul', 
                                'Potencia'=>'1.0',
                                'Opcionais'=>'Ar e direção'),
                'Corsa'=>array('Cor'=>'Vermelho', 
                                'Potencia'=>'1.0',
                                'Opcionais'=>'Ar e direção' ),
                'Gol'=>array('Cor'=>'Branco', 
                                'Potencia'=>'1.6',
                                'Opcionais'=>'Ar e direção' )                                
                );

$carros['Uno']['Cor'] = "Amarelo";
$carros['Uno']['Potencia'] = "1.8R";
$carros['Uno']['Opcionais'] = "Ar, vidros e travas";

echo "<pre>";
foreach ($carros as $key => $value) {
    echo "<p>".strtoupper($key)."<br>";
        foreach ($value as $chave => $valor) {
            echo "$chave: $valor<br>";
        }
    echo "</p>";    
}
echo "</pre>";

