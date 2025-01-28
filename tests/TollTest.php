<?php

class TollTest extends PHPUnit\Framework\TestCase

{
    public function testCalculateToll() {
        $toll = new Toll(0);
        $vehicle = array('type' => 'car');
        $this->assertEquals(100, $toll->calculateToll($vehicle));
    }

    public function testAddFee() {
        $toll = new Toll(0);
        $toll->addFee(10);
        $this->assertEquals(10, $toll->getTotal());
    }

    public function testGetTotal() {
        $toll = new Toll(10);
        $this->assertEquals(10, $toll->getTotal());
    }
}