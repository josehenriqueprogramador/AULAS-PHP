<?php

$fs = fopen("teste.txt", "a");

fwrite($fs, "Linha 01" . PHP_EOL);

fclose($fs);