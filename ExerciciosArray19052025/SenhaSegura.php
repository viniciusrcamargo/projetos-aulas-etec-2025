<?php

$array2 = [1,'A',5,'t','v'];//caracteres aleatorios
$qtdeNumeros = readline('digite a quantidade de caracteres da senha');

for($i=0; $i < $qtdeNumeros; $i++){
    echo "Senha segura " . $array2[rand(0,$qtdeNumeros -1)];
}
// echo $array[0];