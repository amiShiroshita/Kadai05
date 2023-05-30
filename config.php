<?php
require_once ('./db.php');
session_start();

$connect = new Connect;
$pdo = $connect->pdo();
$mail = $_POST['email'];
$pass = $_POST['password'];

if($_POST['email']){
$sql = "SELECT mailaddress FROM User WHERE mailaddress = :mail";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':mail',$mail,PDO::PARAM_STR);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_BOTH);
    if($result){
        $sql = "SELECT mailaddress,password FROM User WHERE mailaddress = :mail AND password = :passwd";
        $login = $pdo->prepare($sql);
        $login->bindValue(':mail',$mail,PDO::PARAM_STR);
        $login->bindValue(':passwd',$pass,PDO::PARAM_STR);
        $login->execute();
        //PDO::FETCH_BOTH カラム名と 0 で始まるカラム番号で添字を付けた配列を返します。
        $resultLogin = $login->fetchAll(PDO::FETCH_BOTH);
        if($resultLogin){
            echo 'ログインできました';
        }else{
            echo 'パスワードが間違っています';
        }
    }else{
        echo $mail,'は登録されていません。新規登録をする必要があります。';
    }
}else{
    echo 'メールアドレスは必須入力です';

}






