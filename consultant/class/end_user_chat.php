<?php
 class EndUserChat{ private $user_id; private $operator_id; public function __construct($user_id, $operator_id) { $this->user_id = intval($user_id); $this->operator_id = intval($operator_id); require_once 'mysql.php'; } public function deleteUser(){ $mysql = Mysql::getInstance(); $sql = "DELETE FROM ok_users_chat WHERE id_user = {$this->user_id}"; $mysql->exec($sql); $this->updateConUsers(); } public function userEndChat(){ $mysql = Mysql::getInstance(); $sql = "UPDATE ok_users_chat SET write_user = '2' WHERE id_user = {$this->user_id}"; $mysql->exec($sql); } public function updateConUsers(){ $mysql = Mysql::getInstance(); $sql = "UPDATE ok_operators SET operator_connected = operator_connected - 1 WHERE operator_id = {$this->operator_id}"; $mysql->exec($sql); } } if(!isset($_SESSION)) session_start(); if(isset($_SESSION['ok_user_id']) OR $_SESSION['who'] == "operator"){ if(!empty($_POST['id_user'])){ $end = new EndUserChat($_POST['id_user'], $_SESSION['operator_id']); $end->deleteUser(); }else{ $end = new EndUserChat($_SESSION['ok_user_id'], $_SESSION['ok_conn_operator']); $end->userEndChat(); } }else die('Error!!! Нет прав!'); ?>
