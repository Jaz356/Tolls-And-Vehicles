<?php

    class Toll
    
{
    private $amount;
    private $toll;

    public function __construct($amount) {
        $this->amount = $amount;
    }

    public function calculateToll($vehicle) {
        // Calculate toll based on vehicle type and number of axles
        if ($vehicle['type'] == 'car') {
            return 100;
        } elseif ($vehicle['type'] == 'motorcycle') {
            return 50;
        } elseif ($vehicle['type'] == 'truck') {
            // Pricing structure for trucks
            $pricing = array(
                1 => 50,
                2 => 100,
                3 => 150,
                4 => 200
            );
            return $pricing[$vehicle['axles']] ?: 0;
        }
    }

    public function addFee($amount) {
        // Add fee to the toll
        $this->amount += $amount;
    }

    public function getTotal() {
        // Get the total toll
        return $this->amount;


    }

    public function addToll($toll) {
        // Add toll to the vehicle
        $this->toll = $toll;
    }

    public function getToll($toll) {
        // Get toll to the vehicle
        $this->toll = $toll;
    }

   
}