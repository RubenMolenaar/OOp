<?php

class Weakness{
    private $EnergyType;
    private $Multiplier;

    public function getEnergyType(){
        return $this->EnergyType;
    }

    public function getMultiplier(){
        return $this->Multiplier;
    }

    public function __construct($EnergyType, $Multiplier)
    {
        $this->EnergyType = $EnergyType;
        $this->Multiplier = $Multiplier;
    }
}