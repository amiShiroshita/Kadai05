<?php
require_once dirname(__DIR__)."/Core/Libs/View.php";
require_once dirname(__DIR__)."/Models/LoginModel.php";

class Login {
    public function index():void {
        View::get('login');
    }

    public function check():void {
        $login = new LoginModel();
        if(!$login->check($_POST)) {
            exit(View::get('login', $login->getErrors()));
        }
        View::get('menu');
    }
}