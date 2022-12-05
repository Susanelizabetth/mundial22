<?php
use PHPUnit\Framework\TestCase;

class TeamsTest extends TestCase
{
    public $team;
    public function setUp(): void
    {
        $this->team = new Teams;
    }

    public function testIfId(){
        $this->assertTrue($this->team->ifId(1));
    }

    public function testCheckBefore(){
        $this->assertTrue($this->team->checkBefore(
            'Equipo',
            'Description',
            'imagen.png',
            '3'
        ));
    }

}