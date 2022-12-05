<?php
use PHPUnit\Framework\TestCase;

class UsersTest extends TestCase
{
    public $user;
    public function setUp(): void
    {
        $this->user = new Users;
    }

    public function testIfId(){
        $this->assertTrue($this->user->ifId(3));
    }

    public function testCheckBefore(){
        $this->assertTrue($this->user->checkBefore(
            'Susana',
            'Castillo',
            'susanae',
            '123456',
            1
        ));
    }

}