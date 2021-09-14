<?php

abstract class Pokemon {

    protected $Name;
    protected $EnergyType;
    protected $Hitpoints;
    protected $Health;
    protected $Attacks;
    protected $Weakness;
    protected $Resistence;
    public static $counter = 0;

    public function __construct()
    {
        self::$counter++;
    }



    public function Attack($attackNumber, $target){
        $damage = $this->Attacks[$attackNumber]->getDamage();


        echo($target->getName() . " heeft voor de attack " . $target->getHealth() . " hp <br>");
        $damage = $target->hit($damage, $this->EnergyType);
        echo("Er is " . $damage . " damage gedaan tegen " . $target->getName() . " met de aanval: '" . $this->Attacks[$attackNumber]->getName() . "'. Er is " . $target->getHealth() ." health over<br>");
        echo(" levende pokemons: ". Pokemon::$counter. "<br>");
    }

    public function Hit($damage, $attackingEnergyType){
        if ($attackingEnergyType == $this->getWeakness()->getEnergyType()){
            $damage = $damage * $this->getWeakness()->getMultiplier();
        }
        if($attackingEnergyType == $this->getResistence()->getEnergyType()){
            $damage = $damage - $this-> getResistence()-> getAmount();
        }
        if($damage >= $this-> Health){
            self::$counter--;
        }
        $this-> Health = $this-> Health - $damage > 0 ? $this-> Health - $damage : 0;
        return $damage;
    }

    public function getName(){
        return $this->Name;
    }

    public function getHealth(){
        return $this->Health;
    }

    public function getResistence(){
        return $this->Resistence;
    }

    public function getWeakness(){
        return $this->Weakness;
    }

    public function setHealth($Health){
        $this->Health = $Health;
    }
}