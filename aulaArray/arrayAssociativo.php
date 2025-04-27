<?php

$pessoa = [
    "nome" => "Pedro Calipso",
    "banda" => "Calipso",
    "musica" => "A lua me traiu",
    "idade" => 55,
    "telefone" => "18 3636 6363"
];

foreach($pessoa as $chave => $valor){
    echo "$chave: $valor\n ";
}