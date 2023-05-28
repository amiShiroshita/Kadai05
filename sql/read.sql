-- 作成
CREATE DATABASE EmployeeDB CHARACTER SET utf8;
-- テーブル選択
USE EmployeeDB;

-- テーブル作成
-- tinyint　ビット数
CREATE TABLE Department (
    dep_id int not null AUTO_INCREMENT,
    dep_name varchar(128) not null,
    del_flg tinyint(1) default 0 not null,
    create_user_id int not null,
    create_date date not null,
    update_user_id int not null,
    update_date date not null,
    PRIMARY KEY (dep_id)
)
comment '部署情報';

CREATE TABLE Post (
    pos_id int not null AUTO_INCREMENT,
    pos_name varchar(128) not null,
    create_user_id int not null,
    create_date date not null,
    update_user_id int not null,
    update_date date not null,
    PRIMARY KEY (pos_id)
)
comment '役員情報';

CREATE TABLE User (
    user_id int not null AUTO_INCREMENT,
    first_name varchar(128) not null,
    last_name varchar(128) not null,
    kana_first_name varchar(128) not null,
    kana_last_name varchar(128) not null,
    mailaddress varchar(255) not null,
    password varchar(64) not null,
    dep_id int not null,
    pos_id int not null,
    del_flg tinyint(1) default 0 not null,
    create_user_id int not null,
    create_date date not null,
    update_user_id int not null,
    update_date date not null,
    PRIMARY KEY (user_id),
    FOREIGN KEY (dep_id) REFERENCES Department(dep_id),
    FOREIGN KEY (pos_id) REFERENCES Post(pos_id),
    INDEX FK_User_dep(dep_id),
    INDEX FK_User_pos(pos_id)
)
comment 'ユーザー情報';

-- データ挿入
INSERT INTO Department (dep_name,create_user_id,create_date,update_user_id,update_date) values
('SI東京営業部',0,'2023-05-27',0,'2023-05-27'),
('HR営業部',0,'2023-05-27',0,'2023-05-27'),
('技術部',0,'2023-05-27',0,'2023-05-27'),
('採用部',0,'2023-05-27',0,'2023-05-27'),
('業務管理部',0,'2023-05-27',0,'2023-05-27');

INSERT INTO Post (pos_name,create_user_id,create_date,update_user_id,update_date) values
('一般社員',0,'2023-05-27',0,'2023-05-27'),
('主任',0,'2023-05-27',0,'2023-05-27'),
('課長',0,'2023-05-27',0,'2023-05-27'),
('部長',0,'2023-05-27',0,'2023-05-27'),
('役員',0,'2023-05-27',0,'2023-05-27'),
('新卒',0,'2023-05-27',0,'2023-05-27');

INSERT INTO User (first_name,last_name,kana_first_name,kana_last_name,mailaddress,password,dep_id,pos_id,create_user_id,create_date,update_user_id,update_date) values
('管理者','アカウント','かんりしゃ','あかうんと','ami.shiroshita@salto.link','adminaccount',3,1,0,'2023-05-27',0,'2023-05-27')