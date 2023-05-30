<?php

class View {
    private static string $_viewPath = "";
    
    private static function _init() {
        self::$_viewPath = dirname(__FILE__, 3).DIRECTORY_SEPARATOR."Views".DIRECTORY_SEPARATOR;
    }
    
    public static function get(string $_viewName, mixed $_default = null) {
        self::_init();
        $param = $_default;
        require_once self::$_viewPath.$_viewName.".html";
    }
}