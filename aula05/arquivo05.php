<?php



// Copiando arquivos

$origem = "Tabuada de 5.txt";
$destino = "../t05.txt";

if(file_exists($origem)){

    if(copy($origem, $destino)){
        echo "Cópia efetuada!";
    }else{
        echo "Cópia não efetuada!";
    }
}else{
    echo "O arquivo \"$origem\" não existe";
}
// Renomeando arquivos

$antigo = "../t09.txt";
$novo = "../tabuada05.txt";

if(file_exists($antigo)){
    if(rename($antigo, $novo)){
        echo "Arquivo renomeado!";
    }else{
        echo "Erro ao renomear o arquivo!";
    }
}else{
    echo "Arquivo $antigo não encontrado!";
}

// Removendo arquivo
if(unlink($novo)){
    echo "O arquivo \"$novo\" foi excluido com sucesso!";
}else{
    echo "Erro ao excluir o arquivo.";
}