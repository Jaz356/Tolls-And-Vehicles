<?php

class VehicleTest extends PHPUnit\Framework\TestCase

{
    public function testToString() {
        $vehicle = new Vehicle('ABC123', 'car');
        $this->assertEquals('License Plate: ABC123, Type: car', (string) $vehicle);
    }

    public function testAddToll() {
        $vehicle = new Vehicle('ABC123', 'car');
        $toll = new Toll(10);
        $vehicle->addToll($toll);
        $this->assertEquals($toll, $vehicle->getToll());
    }
}