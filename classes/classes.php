<?php

function check_if_id($id){

    if($id == null || is_numeric($id) == false){
        return false;
    }else{
        return true;
    }
}

class Groups
{
    public function __construct(){}

    public function ifName($name){
        
        if($name == "" || $name == null){
            return false;
        }else{
            return true;
        }
       
    }

    public function updateGroup($name, $id)
    {

        if ($name == null || $id == null || is_numeric($id) == false) {
            return false;
        }else{
            return true;
        }
    }

    public function ifId($id)
    {
        return check_if_id($id);
    }
}

class Games{
    public function __construct(){}

    public function ifId($id)
    {
        return check_if_id($id);
    }

    public function checkBeforeUpdate($datetime,$team_a,$team_b,$gol_team_a,$gol_team_b)
    {
        if($datetime == null|| ($datetime instanceof DateTime) || $team_a == null || $team_b == null || is_numeric($team_a) == false || is_numeric($team_b) == false ){
            return false;
        }else{
            return true;
        }
    }
}

class Players{
    public function __construct(){}

    public function ifId($id)
    {
        return check_if_id($id);
    }

    public function checkBefore($name,$surname,$team,$position,$photo)
    {
        if($name == null || $surname == null || $team == null || $position == null || $photo == null || is_numeric($team) == false || is_numeric($position) == false){
            return false;
        }else{
            return true;
        }
    }
}

class Users{
    public function __construct(){}

    public function ifId($id)
    {
        return check_if_id($id);
    }

    public function checkBefore($name,$last_name,$username,$password,$type)
    {
    if($name == null || $last_name == null || $username == null || $password == null || $type == null || is_numeric($type) == false ){
            return false;
        }else{
            return true;
        }
    }
}

class Teams
{
    public function __construct()
    {
    }

    public function ifId($id)
    {
        return check_if_id($id);
    }
    public function checkBefore($name, $description, $photo, $id_group)
    {
        if ($name == null || $description == null || $photo == null || $id_group == null || is_numeric($id_group) == false) {
            return false;
        } else {
            return true;
        }
    }

}   
