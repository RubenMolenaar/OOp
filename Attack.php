<?php

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