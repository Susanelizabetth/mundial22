<?php
use PHPUnit\Framework\TestCase;

class GamesTest extends TestCase
{
    public $games;
    public function setUp():void
    {
        $this->games = new Games;
    }

    public function testCheckBeforeUpdate(){
        $this->assertTrue($this->games->checkBeforeUpdate(
            '2020-06-12 20:00:00',
            '1',
            '2',
            '0',
            '0'

        ));
    }

    public function testIfId(){
        $this->assertTrue($this->games->ifId(1));
    }

}