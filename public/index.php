<?php
// ルーティング
ini_set('display_errors', true);

try {
    $actionName = 'index';
    $controllerName = 'LoginController';
    
    // 不正ログイン対策
    if(!array_key_exists('REQUEST_URI', $_SERVER)) {
        exit("REQUEST_URI がありません");
    }

    $urlPath = explode("/", trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/"));

    if(reset($urlPath) != "") {
        $controllerName = sprintf("%sController", ucfirst(current($urlPath)));
    }

    if(next($urlPath)) {
        $actionName = current($urlPath);
    }

    $fileName = dirname(__DIR__).sprintf("/Controllers/%s.php", $controllerName);
    // 対象ファイル存在チェック
    if(!file_exists($fileName)) {
        exit($fileName." がありません");
    }

    require_once realpath($fileName);
    $className = str_replace("Controller", "", $controllerName);
    (new $className)->$actionName();

} catch (Exception $e) {
    var_dump($e->__toString());
    exit();
}