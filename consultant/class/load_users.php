<?php
 header("Content-type: text/html; charset=UTF-8"); session_start(); class LoadUsers{ private $operator_id; public function __construct() { if(isset($_SESSION['operator_id'])) $this->operator_id = intval($_SESSION['operator_id']); require 'mysql.php'; } public function getConnUsers(){ $sql = "SELECT ok_users_chat.id_user, ok_users_chat.new_message_user, ok_users.user_name, ok_users.user_ip FROM ok_users_chat JOIN ok_users WHERE ok_users_chat.id_operator = {$this->operator_id} AND ok_users.user_id = ok_users_chat.id_user ORDER BY ok_users_chat.new_message_user DESC"; $mysql = Mysql::getInstance(); $result = $mysql->query($sql); if($result->rowCount()){ $html = ""; while($connusers = $result->fetch(PDO::FETCH_ASSOC)){ $html .= '<div class="bar_guest" id="'.$connusers['id_user'].'">
							<div class="bar_guest_klient_img"></div>
							<div class="bar_guest_t">
								
								<div class="bar_guest_name">
                                                                        <span class="bar_name_guest_b">'.$connusers['user_name'].'</span>
								</div>
							</div>
							<div class="bar_guest_b">
								<div class="bar_guest_status guest_status_on">'.$connusers['new_message_user'].'</div>
								<div class="bar_guest_time">ожидание: <span>00:00</span> сек.</div>
                                                                
                                                                <div class="us_offline">offline</div>
							</div>
                                                        <div class="bar_guest_close"><span>Закончить чат</span></div>
                                                        <div class="bar_guest_arrow"></div>							
                                                        <input type="hidden" id="user_ip_'.$connusers['id_user'].'" value="'.$connusers['user_ip'].'" />
					</div>'; } echo $html; exit; }else{ exit; } } } if(isset($_SESSION['who']) AND $_SESSION['who'] == "operator"){ $load = new LoadUsers(); $load->getConnUsers(); }else{ die('Error! Нельзя обращаться к файлу напрямую'); } ?>
