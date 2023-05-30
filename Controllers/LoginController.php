<?php
require_once dirname(__DIR__)."/Core/Libs/View.php";

class Login {
    public function index():void {
        View::get('login', "TEST");
    }

    public function fuga():void {
        echo "Login->fuga";
    }
}