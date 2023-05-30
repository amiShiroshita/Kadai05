<?php
require_once dirname(__DIR__)."/Core/DB/Connect.php";


class LoginModel {
    // fields
    private array $_errors = [];

    // getter, setter
    private function setErrors(mixed $str):void {
        array_push($this->_errors, $str);
    }
    public function getErrors():array {
        return $this->_errors;
    }

    public function check(array $arrData):bool {
        $pdo = Connect::get();
        $sql = "SELECT * FROM User WHERE mailaddress = :email AND password = :password AND del_flg = 0";
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':email', $arrData['email'], PDO::PARAM_STR);
            $stmt->bindValue(':password', $arrData['password'], PDO::PARAM_STR);
            $stmt->execute();
            if(!$result = $stmt->fetchall()) {
                $this->setErrors("メールアドレスとパスワードが一致しません");
            }
        } catch (\PDOException $pe) {
            exit($pe->getMessage());
            return false;
        }
        return $result ? true : false;
    }
}