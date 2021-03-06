<?php
require_once "config.php";
//You need to perform this only one time
$create_db = new mysqli(HOST, DB_USER, DB_PASS);
if ($create_db->connect_errno) {
    echo "Не удалось подключиться:".$create_db->connect_error;
    exit();
}
$create_db->query("CREATE DATABASE IF NOT EXISTS `barter_main` CHARACTER SET utf8 COLLATE utf8_general_ci");
$create_db->close();
$create_table = new mysqli(HOST, DB_USER, DB_PASS,"barter_main");
if ($create_table->connect_errno) {
    echo "Не удалось подключиться:".$create_table->connect_error;
    exit();
}
$create_table->query("CREATE TABLE IF NOT EXISTS topics (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name TEXT NOT NULL
)");
$create_table->query("CREATE TABLE IF NOT EXISTS regions (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name TEXT NOT NULL
)");
$create_table->query("CREATE TABLE IF NOT EXISTS cities (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
region_id INT(11),
name TEXT NOT NULL
)");
$create_table->query("CREATE TABLE IF NOT EXISTS advertisements (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(11),
publish_date INT(11),
suggest_from INT(11),
suggest_to INT(11),
title TEXT NOT NULL,
description TEXT NOT NULL,
contacts TEXT NOT NULL,
name TEXT NOT NULL,
media TEXT NOT NULL,
region INT(11),
city INT(11),
price INT(11)
)");

//Users tables
$create_table -> query("CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `registration_date` INT(11),
  `name` varchar(32) NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `activation` varchar(128) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `activation` (`activation`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;");

$region_check = $create_table->query("SELECT COUNT(*) FROM  `regions`");
$res = $region_check->fetch_all(MYSQL_NUM);
if($res[0][0] == 0) {
    $handle = @fopen("regions.txt", "r");
    $buffer = fgets($handle, 4096);
    $create_table->set_charset("utf8");
    if ($handle) {
        while (($buffer = fgets($handle, 4096)) !== false) {
            $region = $create_table->real_escape_string($buffer);
            if ($create_table->real_query("INSERT INTO regions (name) VALUES ('$region')"))
                printf("%s\n", "Success");
            else
                printf("%s\n", "error");
        }
        if (!feof($handle)) {
            echo "Error: unexpected fgets() fail\n";
        }
        fclose($handle);
    }
}
$topics_check = $create_table->query("SELECT COUNT(*) FROM  `topics`");
$res = $topics_check->fetch_all(MYSQL_NUM);
if($res[0][0] == 0) {
    $handle = @fopen("topics.txt", "r");
    $buffer = fgets($handle, 4096);
    $create_table->set_charset("utf8");
    if ($handle) {
        while (($buffer = fgets($handle, 4096)) !== false) {
            $topic = $create_table->real_escape_string($buffer);
            if ($create_table->real_query("INSERT INTO `topics` (name) VALUES ('$topic')"))
                printf("%s\n", "Success");
            else
                printf("%s\n", "error");
        }
        if (!feof($handle)) {
            echo "Error: unexpected fgets() fail\n";
        }
        fclose($handle);
    }
}
mkdir("img");
mkdir("tmp");