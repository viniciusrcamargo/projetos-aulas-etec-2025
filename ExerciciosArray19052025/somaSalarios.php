<?php

$salarios = [2000,4000,6000];
$total = 0;
foreach($salarios as $salario){
    $total += $salario;
}
echo "A média dos salários é " . $total / 3 . PHP_EOL;
echo "O total dos salários é $total ";