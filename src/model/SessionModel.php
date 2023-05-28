<?php
class SessionModel{
    const SESSION_STARTED = TRUE;
    const SESSION_NOT_STARTED = FALSE;

    private $sessionState = self::SESSION_NOT_STARTED;
    private static $instance;

    private function __construst(){}

    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new self;
        }

        self::$instance->startSession();

        return self::$instance;
    }

    
    public function startSession(){
        if( $this->sessionState == self::SESSION_NOT_STARTED){
            $this->sessionState = session_start();
        }
        return $this->sessionState;
    }

    // アクセス不能なプロパティにデータを格納しようとしたとき
    public function __set($name, $value){
        $_SESSION[$name] = $value;
    }

    // アクセス不能なプロパティからデータを読み込もうとしたとき
    public function __get($name){
        if(isset($_SESSION['name'])){
            return $_SESSION[$name];
        }
    }

    // アクセス不能なプロパティに対してisset()あるいはempty()を実行しようとしたとき
    public function __isset($name){
        return isset($_SESSION[$name]);
    }

    // アクセス不能なプロパティに対してunset()を実行しようとしたとき
    public function __unset($name){
        unset($_SESSION[$name]);
    }

    public function destroy(){
        if( $this->sessionState == self::SESSION_STARTED ){
            $this->sessionState = !session_destroy();
            unset($_SESSION);

            return !$this->sessionState;
        }
        return FALSE;
    }
}

$data = Session::getInstance();
$data->nickname='Someone';