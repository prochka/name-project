<?php
 require 'class/mysql.php'; class mOperator extends Mysql{ protected function mCheckLogin($operator_login, $operator_password){ $operator_login = self::filterSQL($operator_login); $operator_password = self::filterSQL($operator_password); $sql = "SELECT * FROM ok_operators WHERE operator_login = $operator_login AND operator_password = $operator_password"; $mysql = self::getInstance(); $res = $mysql->query($sql); if($res->columnCount() == 0){ return false; }else{ return $res->fetch(PDO::FETCH_ASSOC); } } protected function mSetOnline($id_operator, $set){ $mysql = self::getInstance(); $sql = "UPDATE ok_operators SET operator_online = '{$set}' WHERE operator_id = '{$id_operator}'"; $mysql->exec($sql); if($set == '3'){ $sql = "DELETE FROM ok_typing"; $mysql->exec($sql); $sql = "DELETE FROM ok_users_chat WHERE id_operator = {$id_operator}"; $mysql->exec($sql); $sql = "UPDATE ok_operators SET operator_connected = 0 WHERE operator_id = '{$id_operator}'"; $mysql->exec($sql); } } protected function mSetLimit($id_operator, $limit){ $sql = "UPDATE ok_operators SET operator_limit = {$limit} WHERE operator_id = '{$id_operator}'"; $mysql = self::getInstance(); $mysql->exec($sql); } protected function mgetOperatorPhrases($id_operator){ $sql = "SELECT id_phrases, phrases FROM ok_phrases WHERE id_operator = {$id_operator}"; $mysql = self::getInstance(); $res = $mysql->query($sql); if($res->columnCount() == 0){ return false; }else{ $phrases = ""; while($row = $res->fetch(PDO::FETCH_ASSOC)){ $phrases .= '<div><p>'.$row["phrases"].'</p><span id="'.$row["id_phrases"].'" class="del_phrases" title="Удалить фразу"></span></div>'; } return $phrases; } } protected function maddPhrases($id_operator, $phrases){ $mysql = self::getInstance(); $phrases = $mysql->quote($phrases); $sql = "INSERT INTO ok_phrases VALUES(NULL, {$id_operator}, {$phrases})"; $row = $mysql->exec($sql); if($row == 0) return false; else return true; } protected function mgetVoting($id_operator){ $sql = "SELECT voting FROM ok_voting WHERE id_operator = {$id_operator}"; $mysql = self::getInstance(); $res = $mysql->query($sql); return $res->fetchAll(PDO::FETCH_ASSOC); } protected function mupdateOperatorInfo(array $operator_info, $id_operator){ extract($operator_info); $sql = "UPDATE ok_operators SET operator_name = '{$operator_name}', operator_surname = '{$operator_surname}', operator_otdel = '{$operator_otdel}', operator_messages = '{$operator_messages}'  WHERE operator_id = {$id_operator}"; $mysql = self::getInstance(); $mysql->exec($sql); if(isset($operator_info['operator_password'])){ $sql = "UPDATE ok_operators SET operator_password = '{$operator_password}'  WHERE operator_id = '{$id_operator}'"; $mysql = self::getInstance(); $mysql->exec($sql); } return true; } protected function updateOperatorPhoto($new_name, $id_operator) { $sql = "UPDATE ok_operators SET operator_photo = '{$new_name}'  WHERE operator_id = {$id_operator}"; $mysql = self::getInstance(); $mysql->exec($sql); } protected function mcreateMemTable(){ $mysql = self::getInstance(); $sql_table = "CREATE TABLE IF NOT EXISTS ok_users_chat(
	id_user INT(10) NOT NULL,
	id_operator SMALLINT NOT NULL,
	new_message_user TINYINT(10) NOT NULL DEFAULT 0,
	new_message_operator TINYINT(10) NOT NULL DEFAULT 0,
	write_user ENUM('0','1','2') NOT NULL DEFAULT '0',
	write_operator ENUM('0','1','2') NOT NULL DEFAULT '0'
)ENGINE=MEMORY"; $mysql->exec($sql_table); $sql_table = "CREATE TABLE IF NOT EXISTS ok_operators_chat(
	id_mess INT(9) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_operator SMALLINT NOT NULL,
	wr_date INT(10) NOT NULL,
	messages VARCHAR(4000) NOT NULL
)ENGINE=MEMORY"; $mysql->exec($sql_table); $sql_table = "CREATE TABLE IF NOT EXISTS ok_autodialog(
	ip_user BIGINT(12) NOT NULL,
	id_operator SMALLINT NOT NULL,
	message VARCHAR(250) NOT NULL
)ENGINE=MEMORY"; $mysql->exec($sql_table); $sql_table = "CREATE TABLE IF NOT EXISTS ok_moving(
	user_ip BIGINT(12) NOT NULL,
	page VARCHAR(250) NOT NULL,
	page_title VARCHAR(250) NULL,
	at_time INT(10) NOT NULL,
	KEY user_ip (user_ip)
)ENGINE=MEMORY"; $mysql->exec($sql_table); $sql_table = "CREATE TABLE IF NOT EXISTS ok_online(
	user_ip BIGINT(12) NOT NULL PRIMARY KEY,
	ctime INT(10) NOT NULL,
	ltime INT(10) NOT NULL,
	user_info VARCHAR(4000) NOT NULL,
	country CHAR(2) NOT NULL
)ENGINE=MEMORY"; $mysql->exec($sql_table); $sql_table = "CREATE TABLE IF NOT EXISTS ok_typing(
	id_user INT(10) NOT NULL PRIMARY KEY,
	t_mess VARCHAR(1500) NOT NULL
)ENGINE=MEMORY"; $mysql->exec($sql_table); $sql_table = "CREATE TABLE IF NOT EXISTS ok_url(
	id_user INT(10) NOT NULL PRIMARY KEY,
	url VARCHAR(500) NOT NULL
)ENGINE=MEMORY"; $mysql->exec($sql_table); return true; } protected function mClear(){ $mysql = self::getInstance(); $result = $mysql->query('SELECT MAX(id_mess) AS max FROM ok_operators_chat'); $a_r = $result->fetch(2); $del = $a_r['max'] - 40; $sql = "DELETE FROM ok_operators_chat WHERE id_mess < {$del}"; $mysql->exec($sql); $add_date = time() - 2600000; $sql = "DELETE FROM ok_messages WHERE wr_date < '{$add_date}'"; $mysql->exec($sql); $sql = "DELETE FROM ok_users WHERE user_date < '{$add_date}'"; $mysql->exec($sql); } } ?>
