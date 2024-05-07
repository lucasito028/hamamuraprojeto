<?php

namespace Keys;

abstract class Keys{

    protected $host = "localhost";
    protected $user = "root";
    protected $db = "bancodoprojetointegrador";
    protected $password = "";
    protected $port = 3306;

    //The part of Connect
    protected object $conn;

}