<?php

class Charmeleon Extends Pokemon
{
    public function __construct($Name)
    {
        $this->Name = $Name;
        $this->EnergyType = new EnergyType("Fire");
        $this->Hitpoints = 60;
        $this->Health = 60;
        $this->Attacks = array (new Attack("Head Butt", 10), new Attack("Flare", 30));
        $this->Weakness = new Weakness(new EnergyType("Water"), 2);
        $this->Resistence = new Resistance(new EnergyType("Lightning"), 10);
        parent::__construct();
    }
}