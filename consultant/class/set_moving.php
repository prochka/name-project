<?php
 class SetMoving{ private $title = "Не определен"; private $ip; private $page = "/"; public function __construct($title, $ip){ if(!empty($title)){ $this->title = strip_tags($title); } if(isset($_SERVER['REMOTE_ADDR'])) $this->ip = $ip; if(isset($_SERVER['HTTP_REFERER'])) $this->page = $_SERVER['HTTP_REFERER']; } public function set(){ $mysql = Mysql::getInstance(); $this->title = $mysql->quote($this->title); $this->page = $mysql->quote($this->page); $at_time = time(); $sql = "INSERT INTO ok_moving VALUES({$this->ip}, {$this->page}, {$this->title}, '{$at_time}')"; $mysql->exec($sql); $error = $mysql->errorInfo(); if($error[0] != 0){ $sql_table = "CREATE TABLE IF NOT EXISTS `ok_moving`(
                    user_ip BIGINT(12) NOT NULL,
                    page VARCHAR(250) NOT NULL,
                    page_title VARCHAR(250) NULL,
                    at_time VARCHAR(30) NOT NULL,
                    KEY user_ip (user_ip)
                )ENGINE=MEMORY"; $mysql->exec($sql_table); $this->set(); return; } } } ?>
