<?php
/**
 * DB接続をまとめたクラスエラーが出たらエラーが表示される
 *
 * @return DB接続
 * @author 城下
 */
class Connect {
  const DB_NAME='EmployeeDB';
  const HOST='127.0.0.1';
  const UTF='utf8';
  const USER='root';
  const PASS='Saltoshiroshita04@';

  //データベースに接続する関数
  function pdo(){
    $dsn="mysql:dbname=".self::DB_NAME.";host=".self::HOST.";charset=".self::UTF;
    $user=self::USER;
    $pass=self::PASS;
    try{
      $pdo=new PDO($dsn,$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES '.SELF::UTF));
    }catch(Exception $e){
      echo 'error' .$e->getMessage;
      die();
    }
    //エラーを表示してくれる。
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    return $pdo;
  }
}
//使う時
