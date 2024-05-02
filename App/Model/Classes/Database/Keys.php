<?php

namespace Keys;

abstract class Keys{

    protected $host = "localhost";
    protected $user = "root";
    protected $db = "databasesolucao";
    protected $password = "";
    protected $port = 3306;

    //The part of Connect
    protected object $conn;

}