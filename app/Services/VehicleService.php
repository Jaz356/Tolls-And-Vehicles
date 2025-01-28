<?php

class Vehicle

{
    private $licensePlate;
    private $type;
    private $axles;
    private $toll;

    public function __construct($licensePlate, $type, $axles = null) {
        $this->licensePlate = $licensePlate;
        $this->type = $type;
        $this->axles = $axles;
        $this->toll = null;
    }

    public function __toString() {
        if ($this->axles) {
            return "License Plate: $this->licensePlate, Type: $this->type, Axles: $this->axles";
        } else {
            return "License Plate: $this->licensePlate, Type: $this->type";
        }
    }

    public function addToll($toll) {
        // Add toll to the vehicle
        $this->toll = $toll;
    }

    public function getToll() {
        // Get toll to the vehicle
        return $this->toll;
    }
}