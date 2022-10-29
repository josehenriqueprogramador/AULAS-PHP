<?php

require __DIR__.'/vendor/autoload.php';

use \Henriquejardim\Entity\Vaga;

$vagas = Vaga::getVagas();

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';