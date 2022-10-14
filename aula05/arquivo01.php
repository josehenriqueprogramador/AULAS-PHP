<?php
$fs = fopen("Tabuada de 5.txt", "r");
$linha = 1;

while(!feof($fs)){
    $buffer =  fgets($fs);
    if($linha >= 1){
        echo $buffer."<br>";
    }
    $linha++;
}
fclose($fs);