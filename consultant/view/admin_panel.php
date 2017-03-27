<?php
	require './class/mysql.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Панель администратора</title>
        <link type="text/css" rel="stylesheet" href="http://online-consultant/consultant/css/admin.css" />
		<link type="text/css" rel="stylesheet" href="http://online-consultant/consultant/css/chat.css" />
		<link type="text/css" rel="stylesheet" href="http://online-consultant/consultant/css/settings.css" />
        <script type="text/javascript" src="http://online-consultant/consultant/js/jquery.js"></script>
        <script type="text/javascript" src="http://online-consultant/consultant/js/settings.js"></script>
        <script type="text/javascript" src="http://online-consultant/consultant/js/admin.js"></script>
        <link rel="stylesheet" media="screen" type="text/css" href="./css/colorpicker.css" />
        <script type="text/javascript" src="./js/colorpicker.js"></script>
    </head>
    <body>
		<div id="admin_panel_message">
			<span>Это сообщение для проверки</span>
		</div>
            <div id="head">
                <span class="logo"><span>Web</span>Consultant - панель администратора</span>
                <span id="logout"><a href="http://online-consultant/consultant/admin.php?logout=true">Выйти</a></span>
            </div>
            <div id="content">
                <div id="content_left">
					<ul>
						<a href="w_ok_otdel" class="open_window"><li id="ok_otdel">Отделы</li></a>
						<a href="w_ok_add_consult" class="open_window"><li id="ok_add_consult">Консультанты</li></a>
						<a href="w_admin_settings" class="open_window"><li id="admin_settings">Настройка чата</li></a>
						<a href="w_setting_auto_dialog" class="open_window"><li id="setting_auto_dialog">Приглашение в чат</li></a>
						<a href="w_sistem_messages" class="open_window"><li id="sistem_messages">Системные сообщения</li></a>
						<a href="w_offline_form" class="open_window"><li id="offline_form">offline форма</li></a>
						<a href="w_admin_black_list" class="open_window"><li id="admin_black_list">Черный список</li></a>
						<a href="w_admin_dialod" class="open_window"><li id="admin_dialod">Диалоги</li></a>
						<a href="w_get_code" class="open_window"><li id="get_code">Получить код</li></a>
					</ul>
				</div>
				<div id="content_center">
					<div id="window_title">Консультанты</div>
					<form action="http://online-consultant/consultant/class/admin_settings.php" id="settings_form" method="POST">
					<div id="w_ok_otdel" class="close_windows">
					
						<div class="list_group">
							<span>Выберите отдел </span>
							
							<div class="odel_margin">
							<select id="qroup_select">
								<?php
									$mysql = Mysql::getInstance();
                                    $sql = "SELECT * FROM ok_group";
                                    $result = $mysql->query($sql);
									
                                    $res_arr = $result->fetchAll(2);
											
									foreach($res_arr as $group){
										$group_name = $group['group_name'];
										echo '<option id="'.$group['group_id'].'">'.$group_name.'</option>';
									}
								?>
							</select>
							
							<div class="qroup" id="dell_new_group"><div class="dell_qroup"></div>Удалить отдел</div>
							</div>
						</div>
						
						
						<div class="list_group">
							<span>Новый отдел</span>
							
							<div class="odel_margin">
							<input id="group_new_name" type="text" placeholder="Новый отдел" />
							
							<div class="qroup" id="add_new_group"><div class="add_new"></div>Добавить отдел</div>
							</div>
						</div>
						<br />
						<br />
						<div class="form_check_line"><label class="auto_label"><input type="checkbox" id="choose_qroup" name="choose_qroup"> Пользователи выбирают отделы перед началом диалога</label></div>
						
						<div class="form_check_line"><label class="auto_label"><input type="checkbox" id="choose_qroup_a" name="choose_qroup_a"> Пользователи выбирают отделы при приглашениях в чат</label></div>

						<div class="form_check_line"><label class="auto_label"><input type="checkbox" id="choose_qroup_name" name="choose_qroup_name"> Поле для ввода имени обязательно к заполнению</label>
								
						</div>
						<div class="save_settings">Сохранить настройки</div>
					</div>
					
					
					<div id="w_admin_settings" style="position: relative;" class="close_windows">
					
                    <div style="margin: 15px auto; width: 400px;">
					
                        <div style="float: left; text-align: center;">
                                    <div id="chat_position">
										<span>Выберите позицию чата на сайте</span>
                                        <div id="ok_left_center" class="position_id"></div>
                                        <div id="ok_right_center" class="position_id"></div>
                                        <div id="ok_top_center" class="position_id"></div>
                                        <div id="ok_bottom_center" class="position_id"></div>
                                        <div id="ok_bottom_right" class="position_id"></div>
                                        <div id="ok_bottom_left" class="position_id"></div>
                                        <div id="ok_top_left" class="position_id"></div>
                                        <div id="ok_top_right" class="position_id"></div>
                                    </div>
                               
                        </div>
                        
                    </div>
                    
					
					<div style="float: left; width: 100%"></div>
					
					
					<div id="ok_con_web_chat" style="left:53%; position: absolute; top: 232px;"><div id="ok_button" class="ok_online_button"></div><div id="ok_consultant" style="display: block; "><div id="iframe">		
		
          
            <div id="ok_main">
            <div id="ok_black_background"></div>
			<!-- Информация о операторе-->
						<div id="operator_olya">
							<div id="ok_close_chat">
								<div id="ok_turn_off"></div>
								<div id="ok_close"></div>
							</div>
							<div id="avatar_olya">
								<img src="http://online-consultant/consultant/images/operator/no_image.jpg">
							</div>
                            <div id="name_olya">
								<span id="ok_operator_name">Максим</span>
								<span id="ok_operator_surname">Консультант</span>
							</div>
							<div id="otdel">тех. поддержка</div>
                                                        <div id="ok_sound" title="Нажмите, чтобы отключить звук" style="background-position: 0px 0px; "></div>
														
                                                        <div id="ok_tools">
															<div id="ok_guest_name" class="ok_tools_class" title="Представиться"></div>
                                                            <div id="ok_send_dialog" class="ok_tools_class" title="Отправить диалог на е-маил"></div>
                                                            
															<div id="ok_voting" class="ok_tools_class" title="Оценить консультацию"></div>
															<div id="ok_load_file" class="ok_tools_class" title="Отправить файл консультанту"></div>
															
                                                        </div>
						</div>
                        <!-- Информация о операторе-->
                        
                     <div id="ok_padding">
						<div id="masseg_olya" class="scroll-pane jspScrollable" style="overflow: hidden; padding: 0px; width: 318px; " tabindex="0">
                        
                                                    
                                                
						<div class="jspContainer" style="width: 318px; height: 200px; "><div class="jspPane" style="padding: 4px; top: -70px; width: 300px; "><div id="ok_messages_list">
						<!-- Сообщение от оператора -->
								<div class="message_operator">
									<div class="message_operator_t"></div>
								<div class="message_operator_s" id="ok_first_s">
								<div class="message_operator_i">
									<div class="message_operator_n" id="ok_first_n">Максим</div>
									<div class="message_operator_v" id="ok_first_v">16:53:40</div>
								</div>
                                    <span>Здравствуйте, если у Вас возникнут вопросы, задавайте их мне,  я с радостью на них отвечу.</span>							
								</div>
							  
							  <div class="message_operator_b"></div>
							  </div>
						<!-- Сообщение от оператора -->
                                    
                                                    <div class="message_guest"><div class="message_guest_t"></div><div class="message_guest_s"><div class="message_guest_i"><div class="message_guest_n">Дмитрий</div><div class="message_guest_v">18:46:39</div></div>Здравствуйте, сколько стоит доставка по Москве?</div><div class="message_guest_b"></div></div><div class="message_operator"><div class="message_operator_t"></div><div class="message_operator_s"><div class="message_operator_i"><div class="message_operator_n">Максим</div><div class="message_operator_v">18:46:44</div></div><span>Доставка в пределах МКАДа, бесплатна.</span></div><div class="message_operator_b"></div></div></div><div id="ok_typing"><span>Максим</span> печатает...</div></div><div class="jspVerticalBar"><div class="jspCap jspCapTop"></div><div class="jspTrack" style="height: 200px; "><div class="jspDrag" style="height: 149px; top: 51px; "><div class="jspDragTop"></div><div class="jspDragBottom"></div></div></div><div class="jspCap jspCapBottom"></div></div></div></div>
						
						<div id="masseg_olya_send">
                                                    <textarea autofocus="" placeholder="Введите текст вашего сообщения..."></textarea>
													<div id="ok_enter"></div>
						</div>
						
						<div id="consultant_web"><span>онлайн-консультант от <a href="http://online-consultant/" target="_blank" style="color: #1D93F0;">Web<span style="color: #FFF;">Consultant</span></a></span></div>
					</div>

				
		  
            </div>			
	</div></div></div>
					
					
					
					
					
					
					
					
                   
                        <div style="float: left; margin-left: 20px;">
                            <div style="font-size: 15px; font-weight: bold; margin-bottom: 5px;">Цвет чата</div>
                               
                            <div id="color_chat"></div>
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    $('#color_chat').ColorPicker({flat: true, color: '#0000ff', 
                                        onChange: function (hsb, hex, rgb) { //Выполняется непосредственно после выбора
                                            $('#ok_consultant').css('background-color', '#'+hex);
                                            $('#color_chat_h').val('#'+hex);
                                        }
                                    });
                                });
                            </script>
                            
                        </div>
						<div style="float: left; width: 100%"></div>
                        <div style="float: left; margin-left: 20px;">
                            <div style="font-size: 15px; font-weight: bold; margin-bottom: 5px;">Цвет кнопки чата</div>
                            
                            <div id="color_chat_button"></div>
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    $('#color_chat_button').ColorPicker({flat: true, color: '#ff0000', 
                                        onChange: function (hsb, hex, rgb) { //Выполняется непосредственно после выбора
                                              $('#ok_button').css('background-color', '#'+hex);
                                              $('#color_button_h').val('#'+hex);
                                        }
                                    });
                                });
                            </script>
                        </div>
						<div style="float: left; width: 100%"></div>
						<input type="hidden" value="" id="chat_position_h" name="chat_position" />
						<input type="hidden" value="#f00" id="color_chat_h" name="chat_color" />
						<input type="hidden" value="#00f" id="color_button_h" name="button_color" />
						<div class="save_settings">Сохранить настройки</div>
                    </div>
					
					
					<div id="w_setting_auto_dialog" class="close_windows">
						
						<div class="setings_malsi">
							<label class="auto_label"><input type="checkbox" id="enable_autodialog" name="enable_autodialog"> Отправить приглашение в чат для всех посетителей системой</label>
							<div class="auto_info" style="margin-bottom: 10px;">Если поставить приглашение системой, то консультанты не смогут приглашать посетителей в чат</div>
							
							<label class="auto_label"><input type="checkbox" id="enable_autodialog_page" name="enable_autodialog_page"> Всегда показывать приглашения на выбранных страницах</label>
							<div class="auto_info" style="margin-bottom: 15px;">Приглашения на страницах будут показаны всегда, даже если посетитель отказался от приглашения системой, если посетитель примет приглашение, то приглашения перестанут показываться.</div>
							
							<input type="text" class="email_input" id="autodialog_system_name" name="autodialog_system_name" style="margin: 0;" />
							
							<div class="auto_settings">
								<div class="setting_caption">Текст приглашения в чат системой</div>
								<textarea id="autodialog" name="autodialog"> </textarea>
							</div>
							<div class="auto_settings">
								<div class="setting_caption">Текст приглашения в чат, если посетитель вернулся снова</div>
							   <textarea id="autodialog_revisit" name="autodialog_revisit"> </textarea>
							</div>
							<table id="auto_settings_table">
									<tr>
										<td>Показывать приглашение после просмотра </td>
										<td><input type="text" id="autodialog_v_page" name="autodialog_v_page" value="0"> страниц</td>
									</tr>
									<tr>
										<td>Показывать приглашение в чат спустя </td>
										<td><input type="text" id="autodialog_time_show" name="autodialog_time"> секунд</td>
									</tr>
									<tr>
										<td>Скрывать приглашение в чат через </td>
										<td><input type="text" id="autodialog_time_hide" name="autodialog_time_hide" value="0"> секунд<span style="color: #f00;">*</span></td>
									</tr>
							</table>
							<p style="color: #999; margin-top: 2px; font-size: 13px;">* Если поставить 0, то автоматически скрываться не будет. </p>
							
							<div class="malsi_h4"><span>Приглашения для страниц:</span></div>
							
							
							<div class="autodialog_page">
								
								
								<div class="autodialog_url">
									<input type="text"  name="autodialog_url[]" placeholder="url страницы">
									<div class="dell_autodialog">Удалить</div>
									<div class="updata_autodialog">Редактировать</div>
								</div>
								<div class="autodialog_page_close" style="display: block;">
								<div class="auto_settings">
									<div class="setting_caption">Текст приглашения в чат, для страницы</div>
								   <textarea class="autodialog_text" name="autodialog_text[]"> </textarea>
								</div>
								<table id="auto_settings_table">
										<tr>
											<td>Показывать приглашение в чат спустя </td>
											<td><input type="text" class="autodialog_page_show" name="autodialog_page_show[]" value="0" /> секунд</td>
										</tr>
										<tr>
											<td>Скрывать приглашение в чат через </td>
											<td><input type="text" class="autodialog_pade_hide" name="autodialog_pade_hide[]" value="0" /> секунд<span style="color: #f00;">*</span></td>
										</tr>
								</table>
								</div>
							</div>
							
							<div class="qroup" id="add_new_auto_page"><div class="add_new"></div>Добавить еще</div>
							
							<div class="save_settings">Сохранить настройки</div>
						</div>
					</div>
					
					<div id="w_sistem_messages" class="close_windows">
						<!--Системные сообщения-->
						<div class="auto_settings">
							<div class="setting_caption">Сообщение, когда консультант закончил диалог</div>
							<textarea id="cons_close_chat" name="cons_close_chat"></textarea>
						</div>
						
						<table id="auto_settings_table">
									<tr>
										<td>Показать форму обратной связи, если консультант не ответит в течении </td>
										<td><input type="text" id="ok_view_form" name="ok_view_form" value="0"> секунд<span style="color: #f00;">*</span></td>
									</tr>
						</table>
						<p class="s_m_after">* Если поставить 0, то форма обратной связи не покажется. </p>
						
						<div class="autodialog_page">
							<table id="auto_settings_table" style="float: left;">
									<tr>
										<td>Сообщение, если консультант не ответит в течении </td>
										<td><input type="text" name="ok_not_answer_time[]" value="0"> секунд </td>
									</tr>
							</table>
							<div class="dell_not_answer">Удалить</div>
							<div class="auto_settings">
								<textarea class="ok_not_answer" name="ok_not_answer[]"></textarea>
							</div>
						</div>
						
						<div class="qroup" id="add_new_sistem_messages"><div class="add_new"></div>Добавить еще</div>
						<div class="save_settings">Сохранить настройки</div>
					</div>
					
					<div id="w_offline_form" class="close_windows">
					<?php require_once './config/admin_config.php' ?>
						<div class="setings_malsi">
							<label class="auto_label"><input type="checkbox" id="offlinebutton" name="offlinebutton">
							Показывать форму обратной связи, если никого из консультантов нет в online.</label>
							<div class="auto_info" style="margin-bottom: 25px;">Если убрать галочку, то форма обратной связи не покажется для посетителей</div>
							<div class="setting">
								<div class="auto_settings">
									<div class="setting_caption">Cообщение если активных консультантов нет.</div>
									<textarea id="nocons" name="nocons"></textarea>
								</div>

								<table style="float: left; margin: 20px 0;">
										<tr>
											
											<td style="width: 55%; font-size: 15px;">Адрес e-mail, на который будут высылаться сообщения посетителей из формы обратной связи</td>
											<td><input type="text" class="email_input" name="offlin_email" value="<?php echo OFFLINE_EMAIL ?>" /></td>
										</tr>
								</table>
								
								<div class="form_check_line"><label class="auto_label"><input type="checkbox" id="form_name" name="form_name"> Поле для ввода имени обязательно к заполнению</label>
								
								</div>
								<div class="form_check_line">
								<label class="auto_label"><input type="checkbox" id="form_tell" name="form_tell"> Поле для ввода телефона обязательно к заполнению</label>
								
								</div>
								<div class="form_check_line">
								<label class="auto_label"><input type="checkbox" id="form_email" name="form_email"> Поле для ввода e-mail обязательно к заполнению</label>
								
								</div>
							</div>
							<div class="save_settings">Сохранить настройки</div>
						</div>
						
					</div>
					
					<div id="w_admin_black_list" class="close_windows">
					
						<?php
                                            $mysql = Mysql::getInstance();
                                            $sql = "SELECT * FROM ok_blacklist";
											
                                            $result = $mysql->query($sql);
											
                                            $con = 0;
											
                                            while($res_arr = $result->fetch(2)):
											
											$res_arr['ip_user_long'] = long2ip($res_arr['ip_user']);
											$res_arr['add_date'] = date('d-m-Y H:i', $res_arr['add_date']);
											
                                            $con++; 
                        ?>
						<div class="black_list">
							<div class="ip_black_list"><b>IP:</b> <?=$res_arr['ip_user_long']?></div>
							<div class="time_black_list">В черном списке с - <?=$res_arr['add_date']?></div>
							<div  class="dell_black_list" id="<?=$res_arr['ip_user']?>" title="Удалить из черного списка"></div>
						</div>
						<?php endwhile; ?>
						<?php
							if($con == 0){
								echo '<div id="not_in_blacklist"><span>Черный список пустой</span></div>';
							}
						?>
						
					</div>
					
					<div id="w_admin_dialod" class="close_windows"> <!--Диалоги-->
					
						<div id="admin_dialod_panel" class="add_operator_line">
							<div id="for_date"><span>От -</span> <input id="in_for_date" type="date" /> 
							
							<select id="in_for_h"><option value="0">00</option><option value="1">01</option><option value="2">02</option><option value="3">03</option><option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option></select>
							
							<select id="in_for_m"><option value="0">00</option><option value="1">01</option><option value="2">02</option><option value="3">03</option><option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option></select>
							
							</div>
							<div id="to_date"><span>До -</span> <input id="in_to_date" type="date" />
							
							<select id="in_to_h"><option value="0">00</option><option value="1">01</option><option value="2">02</option><option value="3">03</option><option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option></select>
							
							<select id="in_to_m"><option value="0">00</option><option value="1">01</option><option value="2">02</option><option value="3">03</option><option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option></select>
							
							</div>
							<div id="dialog_search">Искать</div>
						</div>
						
						<div id="users_dialog_lst">
							
						</div>
						<div id="user_dialog_story">
							<div id="user_dialog_story_header">История сообщений <div title="Закрыть окно" id="user_dialog_story_close"></div></div>
							
							<div id="user_dialog_story_list">
							
							</div>
						</div>
						
					</div>
					
					<div id="w_get_code" class="close_windows">
						
						<div class="get_code">
                            <p>Разместите следующий HTML-код на страницах сайта где будет отображаться система</p>
                            <textarea spellcheck="false"><!--consultant-web--><link type="text/css" rel="stylesheet" href="http://online-consultant/consultant/css/chat.css" /><link type="text/css" rel="stylesheet" href="http://online-consultant/consultant/css/settings.css" /><script type="text/javascript">document.write('<scr' + 'ipt type="text/javascript" src="http://online-consultant/consultant/js/consultant.js.php?ref='+escape(document.referrer)+'&title='+encodeURIComponent(document.getElementsByTagName("title")[0].text)+'"></scr' + 'ipt>');</script><div id="ok_con_web_chat"><div id="ok_button"></div><div id="ok_consultant"></div></div><!--consultant-web--></textarea>
                            <p>Код необходимо разместить внутри тэга body. Если у вас возникнут проблемы с установкой, обратитесь, пожалуйста в службу технической поддержки.</p>
                        </div>
						
						<div style="width: 100%; margin-top: 20px;">
							
							<div class="add_operator_line">
								<div class="add_operator_line_left">Логин администратора:</div>
								<div class="add_operator_line_right"><input type="text" style="width:220px; height: 20px; padding: 4px; font-size: 17px;" name="admin_login" value="<?php echo ADMIN_LOGIN ?>" /></div>
							</div>
							<div class="add_operator_line">
								<div class="add_operator_line_left">Пароль администратора:</div>
								<div class="add_operator_line_right"><input type="text" style="width:220px; height: 20px; padding: 4px; font-size: 17px;" name="admin_password" value="<?php echo ADMIN_PASSWORD ?>" /></div>
							</div>
												
                        </div>
						<div class="save_settings">Сохранить настройки</div>
						</form>
					</div>
					
					<div id="w_ok_add_consult" class="close_windows"> <!-- Консультанты -->
					 <form action="http://online-consultant/consultant/class/add_operator.php" method="post" enctype="multipart/form-data">
					 <input type="hidden" name="update" value="1">
						<div id="panel_for_add_operator">
							<div class="add_operator_line">
								<div class="add_operator_line_left">Имя консультанта:</div>
								<div class="add_operator_line_right"><input type="text" name="operator_name" value="" style="width:290px;" /></div>
							</div>
							<div class="add_operator_line">
								<div class="add_operator_line_left">Фамилия консультанта:</div>
								<div class="add_operator_line_right"><input type="text" name="operator_surname" value="" style="width:290px;" /></div>
							</div>
							<div class="add_operator_line">
								<div class="add_operator_line_left">Текст приветствия:</div>
								<div class="add_operator_line_right"><input type="text" name="operator_mess" value="" style="width:290px;" /></div>
							</div>
							<div class="add_operator_line">
								<div class="add_operator_line_left">Отдел консультанта:</div>
								<div class="add_operator_line_right"><select id="add_operator_select" name="operator_otdel">
								<?php
									$mysql = Mysql::getInstance();
                                    $sql = "SELECT * FROM ok_group";
                                    $result = $mysql->query($sql);
									
                                    $res_arr = $result->fetchAll(2);
											
									foreach($res_arr as $group){
										$group_name = $group['group_name'];
										echo '<option id="'.$group['group_id'].'" value="'.$group['group_id'].'">'.$group_name.'</option>';
									}
								?>
							</select></div>
							</div>
							<div class="add_operator_line">
								<div class="add_operator_line_left">Логин:</div>
								<div class="add_operator_line_right"><input type="text" name="operator_login" value="" style="width:90px;" /></div>
							</div>
							<div class="add_operator_line">
								<div class="add_operator_line_left">Пароль:</div>
								<div class="add_operator_line_right"><input type="password" name="operator_password" value="" style="width:90px;" /></div>
							</div>
							<div class="add_operator_line">
								<div class="add_operator_line_left">Пароль (ещё раз):</div>
								<div class="add_operator_line_right"><input type="password" name="operator_pass_again" value="" style="width:90px;" /></div>
							</div>
							<div class="add_operator_line">
								<div class="add_operator_line_left">Фотография:</div>
								<div class="add_operator_line_right"><input type="file" name="operator_photo" /></div>
							</div>
							
							<input type="submit" class="save_settings" name="add_operator" style="border: none; margin: 5px; float: right;" value="Добавить консультанта" />
						</div>
						<div class="add_operator">
									<span>Добавить консультанта</span>
                        </div>
                        <?php
                                            
                                            $mysql = Mysql::getInstance();
                                            $sql = "SELECT * FROM ok_operators";
                                            $result = $mysql->query($sql);
											
                                            $con = 0;
                                            while($res_arr = $result->fetch(2)):
											
										
												$sql = "SELECT * FROM ok_group WHERE group_id = '{$res_arr['operator_otdel']}'";
												$otdel = $mysql->query($sql);
								
												if($otdel->columnCount() == 0){
													$res_arr['operator_otdel'] =  'Консультант';
												}else{
													$group = $otdel->fetch(PDO::FETCH_ASSOC);
													$res_arr['operator_otdel'] = $group['group_name'];
												}
                                                $con++;
                                                
                                                $sql = "SELECT voting FROM ok_voting WHERE id_operator = {$res_arr['operator_id']}";
        
                                                $res = $mysql->query($sql); 
                                                
                                                
                                                $voting = $res->fetchAll(PDO::FETCH_ASSOC);
                                                $like = 0; $deslike = 0;
                                                $v_count = count($voting);
                                                for($i = 0; $v_count > $i; $i++){
                                                    if($voting[$i]['voting'] == 0){
                                                        $deslike++;
                                                    }elseif ($voting[$i]['voting'] == 1) {
                                                        $like++;
                                                    }
                                                }
                        ?>
                        <div class="operator" id="<?=$res_arr['operator_id']?>">
                    <div class="op_head">
					<img src="./images/operator/<?=$res_arr['operator_photo']?>" />
					<div class="head_panel_l">
						
						<div class="op_name"><span><?=$res_arr['operator_name']?></span> <?=$res_arr['operator_surname']?></div>
						<div class="op_group"><?=$res_arr['operator_otdel']?></div>
                                                <div id="op_voting">
                                                    <div class="op_voting_like"><span>+<?=$like?> </span></div>
                                                    <div class="op_voting_deslike"><span>-<?=$deslike?> </span></div>
                                                </div>
                                                
								</div>
								<div title="Удалить консультанта" class="del_operator" onclick="delOperator(<?=$res_arr['operator_id']?>)"></div>
                            </div>
                        </div>
                        <?php endwhile; ?>

					</form>	
					</div>

				</div>
				<div id="content_right">
					<div id="online_consulants">Консультанты online</div>
					<div id="consultants_list">

						<?php
                                            
                                            $mysql = Mysql::getInstance();
                                            $sql = "SELECT * FROM ok_operators WHERE operator_online = '1'"; // Достаем всех консультантов online
                                            $result = $mysql->query($sql);
											
                                            $con = 0;
                                            while($res_arr = $result->fetch(2)):
											
										
											
												$sql = "SELECT * FROM ok_group WHERE group_id = '{$res_arr['operator_otdel']}'";
												$otdel = $mysql->query($sql);
								
												if($otdel->columnCount() == 0){
													$res_arr['operator_otdel'] =  'Консультант';
												}else{
													$group = $otdel->fetch(PDO::FETCH_ASSOC);
													$res_arr['operator_otdel'] =  $group['group_name'];
												}

                                            $con++; 
                        ?>
						<div id="op_<?=$res_arr['operator_id']?>" class="operator_online"><img src="images/operator/<?=$res_arr['operator_photo']?>" align="left" width="30"><span class="operators_list_name"><?=$res_arr['operator_name']?> <?=$res_arr['operator_surname']?></span><br><span class="operators_list_otdel"><?=$res_arr['operator_otdel']?></span></div>
                        <?php endwhile; ?>
						<?php
							if($con == 0){
								echo '<div id="operators_in_online"><span>Нету ни одного консультанта online</span></div>';
							}
						?>
					</div>
				</div>
            </div>       
        
    </body>
</html>