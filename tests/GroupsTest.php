<?php

use PHPUnit\Framework\TestCase;

class GroupsTest extends TestCase{
    public $groups;
    
    public function setUp():void
    {
        $this->groups = new Groups;
    }
   
    public function testIfName()
    {
        $this->assertTrue($this->groups->ifName('Grupo K'));
      
    }

    public function testUpdateGroup()
    {
        $this->assertTrue($this->groups->updateGroup('Grupo K',8));
       
    }

    public function testIfId()
    {
        $this->assertTrue($this->groups->ifId(1));
    }
   
}