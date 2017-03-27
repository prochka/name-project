<?php
 header("Content-type: text/html; charset=UTF-8"); error_reporting(0); class LoadMesslist{ private $user_id; private $operator_id; public function __construct(){ if(isset($_POST['user_id'])) $this->user_id = intval($_POST['user_id']); if(isset($_SESSION['operator_id'])) $this->operator_id = intval($_SESSION['operator_id']); require 'mysql.php'; } public function getMessList() { $sql = "SELECT * FROM ok_messages WHERE id_user = {$this->user_id} ORDER BY wr_date"; $mysql = Mysql::getInstance(); $result = $mysql->query($sql); if($result->rowCount()){ $html = '<div id="mess_list_'.$this->user_id.'" class="messages_list"><div class="ok_list">'; while($message = $result->fetch(PDO::FETCH_ASSOC)){ $wr_time = date("H:i:s", $message['wr_date']); if($message['is_from'] == 1){ $html .= '<div class="message_guest">
								<div class="message_guest_img"><img src="../consultant/images/klient_img.png" /></div>
								<div class="message_guest_body">
									<div class="message_guest_n"></div>
									<div class="message_guest_mess">'.$message['messages'].'</div>
								</div>
								<div class="message_guest_t">'.$wr_time.'</div>
							</div>'; }else{ $html .= '<div class="message_operator">
								<div class="message_operator_img"><img src="" /></div>
								<div class="message_operator_body">
									<div class="message_operator_n"></div>
									<div class="message_operator_mess">'.$message['messages'].'</div>
								</div>
								<div class="message_operator_t">'.$wr_time.'</div>
							</div>'; } } $html .= '</div><div id="ok_typing_'.$this->user_id.'" class="ok_typing"><div class="message_guest">
								<div class="message_guest_img"><img src="../consultant/images/klient_img.png" /></div>
								<div class="message_guest_body">
									<div class="message_guest_n"></div>
									<div class="message_guest_mess"><span></span> ...<img class="ok_typing_img" src="../consultant/images/typing.gif" /></div></div>
								</div>
								<div class="message_guest_t"></div>
							</div></div></div>'; echo $html; exit; }else{ exit; } } } session_start(); if(isset($_SESSION['who']) AND $_SESSION['who'] == "operator"){ $load = new LoadMesslist(); $load->getMessList(); }else{ die('Error! Нельзя обращаться к файлу напрямую'); } ?>
