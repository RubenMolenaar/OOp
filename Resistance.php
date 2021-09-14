<?php

class Resistance{
    private $EnergyType;
    private $Amount;

    public function __construct($EnergyType, $Amount)
    {
        $this->EnergyType = $EnergyType;
        $this->Amount = $Amount;
    }

    public function getEnergyType(){
        return $this->EnergyType;
    }

    public function getAmount(){
        return $this->Amount;
    }


}