<?php
header("Content-Type: text/html; charset=UTF-8"); ?>
		
		<script type="text/javascript" src="http://online-consultant/consultant/js/scroll.js"></script>
        <script type="text/javascript" src="http://online-consultant/consultant/js/mousewheel.js"></script>
		<link type="text/css" rel="stylesheet" href="http://online-consultant/consultant/css/scroll.css" />
		
		<script type="text/javascript">
			<?php echo file_get_contents('./js/chat.js'); ?>
		</script>
		
			
			<div id="ok_group">
				<div id="ok_close_group">
					<div class="ok_turn_off" title="Закрыть окно"></div>
				</div>
				<div id="ok_group_center">
					<h4 class="ok_group_h4">Задать вопрос консультанту</h4>
					<div id="ok_user_name_input">
						<input type="text" id="ok_group_user_name" value="Ваше имя" />
					</div>
					<div id="ok_group_select">
						<div class="ok_select_background">
							<span>Выберите отдел</span>
						</div>
						<ul id="ok_select_select">
							<?php
 if(empty($_COOKIE['operator_id'])){ require 'class/mysql.php'; $mysql = Mysql::getInstance(); $sql = "SELECT * FROM ok_group"; $result = $mysql->query($sql); $res_arr = $result->fetchAll(2); foreach($res_arr as $group){ $sql = "SELECT COUNT(*) AS count FROM ok_operators WHERE operator_otdel = {$group['group_id']} AND operator_online = '1'"; $result = $mysql->query($sql); $count = $result->fetch(PDO::FETCH_ASSOC); if($count['count'] != 0){ $group_name = $group['group_name']; echo '<li id="'.$group['group_id'].'">'.$group_name.'</li>'; } } } ?>
						</ul>
					</div>
					<div id="ok_group_text">
						<textarea id="ok_group_textarea" placeholder="Введите текст вашего сообщения..."></textarea>
					</div>
					<div id="ok_group_message"></div>
					<div id="ok_group_submit" class="ok_button button-green"><span>Отправить</span></div>
				</div>
			</div>
			
            <div id="ok_main">
            <div id="ok_black_background"></div>
			<!-- Информация о операторе-->
						<div id="operator_olya">
							<div id="ok_close_chat">
								<div class="ok_turn_off" title="Свернуть окно"></div>
								<div id="ok_close" title="Закончить диалог"></div>
							</div>
							<div id="avatar_olya">
								<img src="">
							</div>
                            <div id="name_olya">
								<span id="ok_operator_name"></span>
								<span id="ok_operator_surname"></span>
							</div>
							<div id="otdel"></div>
                                                        <div id="ok_sound" title="Нажмите, чтобы отключить звук"></div>
														
                                                        <div id="ok_tools">
															<div id="ok_guest_name" class="ok_tools_class" title="Представиться"></div>
                                                            <div id="ok_send_dialog" class="ok_tools_class" title="Отправить диалог на е-маил"></div>
                                                            
															<div id="ok_voting" class="ok_tools_class" title="Оценить консультацию"></div>
															<div id="ok_load_file" class="ok_tools_class" title="Отправить файл консультанту"></div>
															
                                                        </div>
						</div>
                        <!-- Информация о операторе-->
                        
                     <div id="ok_padding">
						<div id="masseg_olya" class="scroll-pane">
                        <div id="ok_messages_list">
						<!-- Сообщение от оператора -->
								<div class="message_operator">
									<div class="message_operator_t"></div>
								<div class="message_operator_s" id="ok_first_s">
								<div class="message_operator_i">
									<div class="message_operator_n" id="ok_first_n"></div>
									<div class="message_operator_v" id="ok_first_v"></div>
								</div>
                                    <span></span>							
								</div>
							  
							  <div class="message_operator_b"></div>
							  </div>
						<!-- Сообщение от оператора -->
                                    
                                                    </div>
                                                    <div id="ok_typing"><span>Консультант</span> печатает...</div>
                                                
						</div>
						
						<div id="masseg_olya_send">
                                                    <textarea autofocus placeholder="Введите текст вашего сообщения..."></textarea>
													<div id="ok_enter"></div>
						</div>
						
						<div id="consultant_web"><span>онлайн-консультант от <a href="http://online-consultant/" target="_blank" style="color: #1D93F0;">Web<span style="color: #FFF;">Consultant</span></a></span></div>
					</div>

					<div id="ok_send_mess_email" class="ok_windows">
						<div id="ok_close_email" class="ok_close_window" title="Закрыть"></div>
						<span>Отправить диалог на e-mail</span>
						<div class="ok_window_center" id="ok_email_hide"><input type="text" id="ok_send_email" placeholder="Ваш e-mail" /><div id="ok_enter_email" class="ok_button_grad"><img src="http://online-consultant/consultant/images/mess.png" /></div></div>
						<p id="ok_message_email"></p>
					</div>
					<div id="ok_introduce" class="ok_windows">
						<div id="ok_close_introduce" class="ok_close_window" title="Закрыть"></div>
						<span>Представиться</span>
						<div class="ok_window_center"><input type="text" id="ok_new_name" value="" /><div id="ok_enter_name" class="ok_button_grad"><img src="http://online-consultant/consultant/images/name.png" /></div></div>
					</div>
					<div id="ok_con_voting" class="ok_windows">
						<div id="ok_close_voting" class="ok_close_window" title="Закрыть"></div>
						<span style="margin-left: 25px;">Оцените консультацию</span>
						<div class="ok_window_center">
							<div class="ok_vot_arrow">
								<div id="ok_voting_like" title="Понравилась" onclick="voting(1)"></div>
								<div id="ok_voting_deslike" title="Не понравилась" onclick="voting(0)"></div>
							</div>
							
						</div>
						<p class="ok_vot_mess"></p>
					</div>
					<div id="ok_upload_file" class="ok_windows">
						<div id="ok_close_file" class="ok_close_window" title="Закрыть"></div>
						<span style="margin-left: 51px;">Загрузить файл</span>
						<div id="uploadButton" class="button">
							<div id="ok_change_file">Выбрать файл</div>
							<div id="ok_file_img_hide" style="position: relative; top: 5px; left: 35px;display: none;"><img id="load" src="http://online-consultant/consultant/images/file.png"/></div>
						</div>
					</div>
						<input id="ok_user_name" type="hidden" value="Гость" />
                        <audio id="mess_sound">
                            <source src="http://online-consultant/consultant/audio/sound.ogg" type='audio/ogg; codecs=vorbis' >
                            <source src="http://online-consultant/consultant/audio/sound.mp3" type="audio/mpeg" >
                        </audio>
            </div>			
	