<?php
// Manipulação de diretórios

// Lendo o conteúdo de um diretório
$diretorio = "../";

if(is_dir($diretorio)){
    $linhas = scandir($diretorio);
    foreach ($linhas as $valor) {
        echo $valor . "<br>" . PHP_EOL;
    }
}

// Criando um diretório
$diretorio = "../Exemplo";
if(mkdir($diretorio, 0777)){
    echo "Diretório criado com sucesso!";
}else{
    echo "Erro ao criar o diretório.";
}

// Removendo um diretório
if(rmdir($diretorio)){
    echo "$diretorio excluído com sucesso!";
}else{
    echo "Erro ao excluir o diretório!";
}