<?php

class SingleTon{
    private $num = 1;
    private $drink = array();
    private static $pdo;
    public function __construct()
    {
        
    }
    public static function getInstance()
    {
        if ( !isset(self::$pdo))
        {
            self::$pdo = new self;
        }
        
        self::$pdo->startSession();
        
        return self::$pdo;
    }

}
$data = SingleTon::getInstance();
// __issetが呼ばれる
