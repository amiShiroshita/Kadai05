<?php

class Connect {
    private const DB_HOST = "mysql";
    private const DB_NAME = "EmployeeDB";
    private const DB_USER = "root";
    private const DB_PASS = "root";
    private const CHARSET = "utf8";
    private array $_options = [];

    private static ?\PDO $_instance = null;

    private function __construct() {
        $this->_options = [
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ];
        $this->_init();
    }

    private function _init() {
        try {
            self::$_instance = new \PDO(
                sprintf("mysql:host=%s;dbname=%s;charset=%s", self::DB_HOST, self::DB_NAME, self::CHARSET),
                self::DB_USER,
                self::DB_PASS,
                $this->_options
            );
        } catch (\PDOException $pe) {
            exit(var_dump($pe->getMessage()));
        }
    }

    public static function get():\PDO {
        if(is_null(self::$_instance)) new self();
        return self::$_instance;
    }
}