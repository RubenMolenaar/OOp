<?php

class Pikachu Extends Pokemon{
    public function __construct($Name)
    {
        $this->Name = $Name;
        $this->EnergyType = new EnergyType("Lightning");
        $this->Hitpoints = 60;
        $this->Health = 60;
        $this->Attacks = array (new Attack("Electric Ring", 50), new Attack("Pika Punch", 20));
        $this->Weakness = new Weakness(new EnergyType("Fire"), 1.5);
        $this->Resistence = new Resistance(new EnergyType("Fighting"), 20);
        parent::__construct();
    }
}
