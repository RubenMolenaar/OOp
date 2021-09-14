<?php

//loads all classes when needed
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$pikachu = new Pikachu ("Pikachu1");
$charmeleon = new Charmeleon ("Charmeleon1");


$pikachu->attack(0, $charmeleon);
$charmeleon->attack(1, $pikachu);
$charmeleon->attack(0, $pikachu);