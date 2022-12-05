<?php
use PHPUnit\Framework\TestCase;

class PlayersTest extends TestCase
{
    public $player;
    public function setUp(): void
    {
        $this->player = new Players;
    }

    public function testIfId(){
        $this->assertTrue($this->player->ifId(1));
    }

    public function testCheckBefore(){
        $this->assertTrue($this->player->checkBefore(
            'Lukas',
            'KLOSTERMANN',
            '1',
            '2',
            'imagen.png'
        ));
    }

}