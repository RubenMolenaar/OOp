<?php

class Pokemon {

    private $Name;
    private $EnergyType;
    private $Hitpoints;
    private $Health;
    private $Attacks;
    private $Weakness;
    private $Resistence;

    public static $counter = 0;

    public function __construct($Name, $EnergyType, $Hitpoints, $Attacks, $Weakness, $Resistence)
    {
        $this->Name = $Name;
        $this->EnergyType = $EnergyType;
        $this->Hitpoints = $Hitpoints;
        $this->Health = $Hitpoints;
        $this->Attacks = $Attacks;
        $this->Weakness = $Weakness;
        $this->Resistence = $Resistence;
        self::$counter++;
    }



    function attack($attackNumber, $target){
        $damage = $this->Attacks[$attackNumber]->getDamage();
        if ($this->EnergyType == $target->getWeakness()->getEnergyType()){
             $damage = $this->Attacks[$attackNumber]->getDamage() * $target->getWeakness()->getMultiplier();
        }
        if($this->EnergyType == $target->getResistence()->getEnergyType()){
            $damage = $damage - $target-> getResistence()-> getAmount();
        }
        echo($target->getName() . " heeft voor de attack " . $target->getHealth() . " hp <br>");
        $target->hit($damage);
        echo("Er is " . $damage . " damage gedaan tegen " . $target->getName() . " met de aanval: '" . $this->Attacks[$attackNumber]->getName() . "'. Er is " . $target->getHealth() ." health over<br>");
        echo(" levende pokemons: ". Pokemon::$counter. "<br>");
    }

    function hit($damage){
        if($damage > $this-> Health){
            self::$counter--;
        }
        $this-> Health = $this-> Health - $damage > 0 ? $this-> Health - $damage : 0;
    }

    function getName(){
        return $this->Name;
    }

    function getHealth(){
        return $this->Health;
    }

    function getResistence(){
        return $this->Resistence;
    }

    function getWeakness(){
        return $this->Weakness;
    }

    function setHealth($Health){
        $this->Health = $Health;
    }
}
class EnergyType{
    private $Name;
    public function __construct($Name)
    {
        $this->Name = $Name;
    }
}

class Attack{
    private $Name;
    private $Damage;

    public function getDamage(){
        return $this->Damage;
    }

    public function getName(){
        return $this->Name;
    }

    public function __construct($Name, $Damage)
    {
        $this->Name = $Name;
        $this->Damage = $Damage;
    }
}

class Weakness{
    private $EnergyType;
    private $Multiplier;

    function getEnergyType(){
        return $this->EnergyType;
    }

    function getMultiplier(){
        return $this->Multiplier;
    }

    public function __construct($EnergyType, $Multiplier)
    {
        $this->EnergyType = $EnergyType;
        $this->Multiplier = $Multiplier;
    }
}

class Resistance{
    private $EnergyType;
    private $Amount;

    function getEnergyType(){
        return $this->EnergyType;
    }

    function getAmount(){
        return $this->Amount;
    }

    public function __construct($EnergyType, $Amount)
    {
        $this->EnergyType = $EnergyType;
        $this->Amount = $Amount;
    }
}

$Fire = new EnergyType("Fire");
$Lightning = new EnergyType("Lightning");
$Water = new EnergyType("Water");
$Fighting = new EnergyType("Water");


$pikachu = new Pokemon (
    "Pikachu",
    $Lightning,
    60,
    array (new Attack("Electric Ring", 50), new Attack("Pika Punch", 20)),
    new Weakness($Fire, 1.5),
    new Resistance($Fighting, 20)
);

$charmeleon = new Pokemon (
    "Charmeleon",
    $Fire,
    60,
    array (new Attack("Head Butt", 10), new Attack("Flare", 30)),
    new Weakness($Water, 2),
    new Resistance($Lightning, 10)
);

$pikachu->attack(0, $charmeleon);
$charmeleon->attack(1, $pikachu);