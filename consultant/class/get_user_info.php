<?php
 header("Content-type: application/json"); class GetUserInfo{ private $user_ip; public function __construct() { $this->user_ip = $_POST['user_ip']; require 'mysql.php'; } public function getInfo(){ if($user_info = $this->getBasicInformation()){ $user_info['user_info'] = unserialize($user_info['user_info']); $user_info['moving'] = $this->getMoving(); echo json_encode($user_info); exit; }else{ exit; } } private function getBasicInformation(){ $sql = "SELECT user_info FROM ok_online WHERE user_ip = {$this->user_ip}"; $mysql = Mysql::getInstance(); $result = $mysql->query($sql); if($result->columnCount() == 0){ return false; }else{ return $result->fetch(PDO::FETCH_ASSOC); } } private function getMoving(){ $sql = "SELECT * FROM ok_moving WHERE user_ip = {$this->user_ip} ORDER BY at_time DESC"; $mysql = Mysql::getInstance(); $result = $mysql->query($sql); if($result->columnCount() == 0){ return false; }else{ return $result->fetchAll(PDO::FETCH_ASSOC); } } } session_start(); if(isset($_SESSION['who'])){ $load = new GetUserInfo(); $load->getInfo(); }else{ die('Error! Нет прав!!!'); } ?>
