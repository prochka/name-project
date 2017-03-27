<!DOCTYPE html>
<html>
	<head>
		
		<title>Панель оператора</title>
		<link type="text/css" rel="stylesheet" href="css/operator_style.css" />
		
		<script type="text/javascript" src="http://online-consultant/consultant/js/jquery.js"></script>
        <script type="text/javascript" src="http://online-consultant/consultant/js/cookie.js"></script>
        <script type="text/javascript" src="http://online-consultant/consultant/js/timers.js"></script>
		<script type="text/javascript" src="http://online-consultant/consultant/js/ajaxupload.js"></script>
		<script type="text/javascript" src="http://online-consultant/consultant/js/operator.js"></script>
		
		
		<!--[if gte IE 7]>
		  <style type="text/css">
		   #content{
				display: none;
		   }
		   #ie_message{
				display: block;
				text-align: center;
				width: 100%;
				margin-top: 50px;
				color: #DDD;
				font-size: 22px;
				font-family: Tahoma;
		   }
		  </style>
		<![endif]-->

	</head>
	<body>
           <audio id="mess_sound">
                <source src="http://online-consultant/consultant/audio/sound.ogg" type='audio/ogg; codecs=vorbis' >
                <source src="http://online-consultant/consultant/audio/sound.mp3" type="audio/mpeg" >
           </audio>
		<div id="ie_message">Панель консультанта не работает в IE, используйте другой современный браузер.</div>
		<div id="content">
			<div id="head">
				<div class="head_center">
					<img id="operator_image" align="left" src="./images/operator/[photo]" />
					<div id="head_panel_l">
						
						<div id="name"><span>[name]</span> [surname]</div>
						<div id="group">[otdel]</div>
						
						
					</div>
                                        <div id="head_panel_c">
                                            <div style="margin:0 auto; width: 360px;">
                                                <div class="hover_head_panel"><div id="ok_dialog" class="head_panel_c_div" title="Чат с клиентами"><div class="ok_count">0</div><span>Консультация</span></div></div>
                                                <div class="hover_head_panel"><div id="ok_visitors" class="head_panel_c_div" title="Посетители online"><div class="ok_count">0</div><span>Посетители</span></div></div>
                                                <div class="hover_head_panel"><div id="operator_chat" class="head_panel_c_div" title="Чат консультантов"><div class="ok_count">0</div><span>Консультанты</span></div></div>
                                                <div class="hover_head_panel"><div id="ok_settings" class="head_panel_c_div" title="Настройки"><span>Настройки</span></div></div>
                                            </div>
                                        </div>
					<div id="head_panel_r">
						<div id="buttom_out_status">
                                                        <div id="operator_exit" title="Выход"><a href="operator.php?logout=true" onClick="operatorExit()"><img src="images/out.png" /></a></div>
                                                        <div id="operator_status" title="Сменить статус"><img src="" /></div>
						</div>
                                            <div id="op_voting">
                                                <div><div id="op_voting_like"></div> <span style="color: green;">+[like]</span></div>
                                                <div><div id="op_voting_deslike"></div> <span style="color: red;">-[deslike]</span></div>
                                            </div>
					</div>
				</div>
			</div>
			<div id="content_v">
			<div id="close_global_window" title="Закрыть окно"></div>
				
				<div id="admin_chat" class="ok_windows">
				<div id="w_link_in">
				<input type="text" placeholder="url страницы" />
				<div id="link_in_enter">Перенаправить</div>
				<div id="link_in_close">Отменить</div>
			</div>
			<div id="ok_upload_file" class="ok_min_windows">
						<div id="ok_close_file" class="ok_close_window" title="Закрыть"></div>
						<span style="margin-left: 51px;">Загрузить файл</span>
						<div id="uploadButton" class="button">
							<div id="ok_change_file">Выбрать файл</div>
							<div id="ok_file_img_hide" style="position: relative; top: 5px; left: 35px;display: none;"><img id="load" src="http://online-consultant/consultant/images/file.png"/></div>
						</div>
			</div>
				 <!--Co-browse-->
							
							<div id="d_co_browse">
								<iframe id="i_co_browse"></iframe>
							</div>
						
						<!--Co-browse-->
				
				<div id="ok_sound" class="" onmouseover="functionMess('Отключить звук');"></div>
					
					<div id="admin_left_bar">
						<div id="admin_left_bar_tools">
							<div id="guests">Клиентов в чате: <span id="guest_count">0</span></div>
							<div id="limit" title="Установить лимит клиентов в чате">
							 
							<span class="select_limit">
								<span class="left_limit">
									<span class="button_limit">
										<span class="center_limit">[limit]</span>
									</span>
								</span>
									<select class="limit_select">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
                                        <option value="11">11</option>
										<option value="12">12</option>
										<option value="13">13</option>
										<option value="14">14</option>
										<option value="15">15</option>
										<option value="16">16</option>
										<option value="99">&infin;</option>
									</select>
							</span>
							</div>
						</div>
						<div class="users_in_chat_p">
							<div id="users_in_chat">
								<div id="no_users_in_chat">
									<span>Нет ни одного клиента в чате</span>
								</div>
								<!--Пользователи чата-->
							</div>
						</div>
					</div>
                                    
					
					<div id="admin_right_bar">
					
						<div id="admin_right_bar_tools">
								<div id="admin_right_bar_klient_name">Диалог с клиентом - <span></span></div>
								<div id="admin_right_bar_mess_clear">Очистить окно чата</div>
						</div>
						
						
							<div id="admin_no_dialog_massage">
								<h2>Сообщения не загружены</h2>
								
								<p>Сообщения не загружены, чтобы загрузить сообщения выберите пользователя в окошке слева.</p>
							</div>
							<div class="user_messages_list_p">
                                <div id="user_messages_list">
                                    <!--Сообщения чата-->
                                </div>
								
                            </div>
							<div style="margin-top: -131px; float: left; bottom: 0; width: 100%; height: 131px; position: relative;">
								<div id="operator_function">
													
													<div id="rerouting" class="f_botton" title="Передать другому консультанту" onmouseover="functionMess('Передать другому консультанту');"><img src="images/rerouting.png" /></div>
													<div id="ok_phrases" class="f_botton" title="Быстрые фразы" onmouseover="functionMess('Быстрые фразы');"><img src="images/ok_phrases.png" /></div>
													<div id="black_list" class="f_botton" title="Добавить в черный список" onmouseover="functionMess('Добавить в черный список');"><img src="images/black_list.png" /></div>
													<div id="get_info_user" class="f_botton" title="Информация о клиенте" onmouseover="functionMess('Информация о клиенте');"><img src="images/user_info.png" /></div>
													<div id="load_file" class="f_botton" title="Передать файл" onmouseover="functionMess('Передать файл');"><img src="images/load_file.png" /></div>
													<div id="link_in" class="f_botton" title="Перенаправить на страницу"><img src="images/link_in.png" /></div>
								</div>
								<div id="admin_tablo_chat">
									<textarea placeholder="Введите сообщение и нажмите Enter" ></textarea>
									<div id="admin_tablo_chat_add_mess">Отправить</div>
								</div>
							</div>
						
					</div>
                                    <div id="right">
                                        
                                        <div id="info_user_chat" class="info_user_close">
                                            <div class="info_heads" >Информация о клиенте</div>
											<div class="info_user_chat_div_p">
												<div id="info_user_chat_div">
												<div class="no_info_in_chat">
													<span>Информация не загружена, возможно посетитель ушел из сайта</span>
												</div>
												</div>
											</div>
                                        </div>
                                        <div id="div_operator_phrases" class="info_user_close">
                                            <div class="info_heads">Быстрые фразы</div>
											<div class="operator_phrases_p">
												<div id="operator_phrases">
													[phrases]
												</div>
											</div>
                                             <div id="add_operator_phrases">
                                            <textarea placeholder="Введите новую фразу и нажмите Enter"></textarea>
                                            
                                            
                                        </div>
                                        </div>
                                       
                                       
                                        <div id="rerouting_operators" class="info_user_close">
                                            <div class="info_heads">Передать консультанту</div>
											<div class="list_rerouting_operators_p">
												<div class="no_online_operators">
													<span>Нету ни одного консультанта online</span>
												</div>
												<div id="list_rerouting_operators"></div>
											</div>
                                        </div>
                                       
                                    </div>
                                    
                                    
				</div>
                            <!-- Чат операторов -->
                            <div id="div_operator_chat" class="ok_windows">
								<div id="right_operator_chat">
                                    <div id="online_operators">Консультанты online</div>
									<div class="no_online_operators">
											<span>Нету ни одного консультанта online</span>
									</div>
                                    <div id="list_online">
										
									</div>
                                </div>
                                <div id="left_operator_chat">
									<div class="left_operator_chat_head">
										<div class="left_operator_chat_info">Чат консультантов</div>
										<div id="list_operators_mess_clear">Очистить окно чата</div>
									</div>
									<div class="list_operators_mess_p">
										<div id="list_operators_mess">
											
										</div>
									</div>
                                    <div id="text_operator_chat">
                                        <textarea id="operator_send_mess" placeholder="Введите ваше сообщение и нажмите Enter" ></textarea>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- Чат операторов -->
                            
                            <!-- Посетители online -->
                            
                            <div id="online_users" class="ok_windows">
                                
                                <!--Приглашение в чат-->
                                <div id="autodialog">
                                    
                                    <div id="autodialog_text">Приглашение в чат</div>
                                    <textarea id="invite_autodialog_mess">[operator_messages]</textarea>
                                    <div id="autodialog_message"></div>
									
                                    <div id="invite_autodialog">Отправить</div>
									<div id="autodialog_close">Отменить</div>
                                </div>
                                <div id="left_online_users">
                                    <div id="users_count" class="hed">Посетители online <span>0</span></div>
									<div class="list_online_users_p">
										<div id="no_guests" class="no_mess">
											<span>Нет ни одного посетителя на сайте</span>
										</div>
										<div id="list_online_users">
											
										</div>
									</div>
                                </div>
                                 <div id="right_online_users">
                                     <div id="users_info">
                                        <div class="hed">Информация</div>
										<div class="list_users_info_p">
											<div id="no_guests_info" class="no_mess">
												<span>Информация о посетителе<br /> не загружена</span>
											</div>
											<div id="list_users_info">
												 
											</div>
										</div>
                                     </div>
                                    <div id="users_moving">
                                         <div class="hed">Пути по сайту (новые вверху)</div>
										 <div class="user_moving_list_p">
											<div id="no_guests_moving" class="no_mess">
												<span>Пути по сайту не загружены,  Вы не <br /> выбрали посетителя</span>
											</div>
											 <div id="user_moving_list">
											 
											 </div>
										 </div>
                                     </div>
                                    
                                </div>
                            </div>
                            
                            <!-- Посетители online -->
                            
                            <!-- Настройки для оператора -->
                            <div id="operator_settings" class="ok_windows">
                                <div id="settings_head">Настройки для консультанта</div>
                                <div id="operator_settings_center">
                                
                                <form action="http://online-consultant/consultant/operator.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="update" value="1">
                                    <table>
                                        <tbody>
                                        <tr>
                                            <td valign="top"><span>Ваше имя:</span></td>
                                            <td width="20"> </td>
                                            <td>
                                                <div class="settings_form" style="width:300px;"><input type="text" name="operator_name" value="[name]" style="width:290px;" /></div>
                                            
                                            <font style="font-size:11px;color:#808080;">Имя оператора, которое будут видеть ваши клиенты</font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top"><span>Ваша фамилия:</span></td>
                                            <td width="20"> </td>
                                            <td>
                                            <div class="settings_form" style="width:300px;"><input type="text" name="operator_surname" value="[surname]" style="width:290px;" /></div>
                                            
                                            <font style="font-size:11px;color:#808080;">Фамилия оператора, которое будут видеть ваши клиенты</font>
                                            </td>
                                        </tr>
										<input type="hidden" name="operator_otdel" value="[otdel_id]" style="width:290px;" />
                                        <!--<tr>
                                            <td valign="top"><span>Ваш отдел:</span></td>
                                            <td width="20"> </td>
                                            <td>
                                            <div class="settings_form" style="width:300px;"><input type="text" name="operator_otdel" value="[otdel]" style="width:290px;" />
											
											</div>
                                            
                                            <font style="font-size:11px;color:#808080;">Введите отдел этого оператора</font>
                                            </td>
                                        </tr>-->
                                        <tr>
                                            <td valign="top"><span>Текст приветствия:</span></td>
                                            <td width="20"> </td>
                                            <td>
                                            <div class="settings_form" style="width:300px;"><input type="text" name="operator_mess" value="[operator_messages]" style="width:290px;" /></div>
                                            
                                            <font style="font-size:11px;color:#808080;">Введите текст приветствия для оператора</font>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td valign="top"><span>Пароль:</span></td>
                                            <td width="20"> </td>
                                            <td>
                                            <div class="settings_form" style="width:100px;"><input type="password" name="operator_password" value="" style="width:90px;" /></div>
                                            
                                            <font style="font-size:12px;color:#808080;">От 6 до 18 символов</font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top"><span>Пароль (ещё раз):</span></td>
                                            <td width="20"> </td>
                                            <td>
                                            <div class="settings_form" style="width:100px;"><input type="password" name="operator_pass_again" value="" style="width:90px;" /></div>
                                            
                                            <font style="font-size:11px;color:#808080;">Введите пароль ещё раз</font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top"><span>Фотография:</span></td>
                                            <td width="20"> </td>
                                            <td>
                                            <div class="settings_form" style="width:300px;"><input type="file" name="operator_photo" /></div>
                                                
                                            <font style="font-size:11px;color:#808080;">Поддерживаются форматы JPG,GIF,PNG</font>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    
                                    <input type="submit" value="Сохранить изменения" id="setting_submit" name="add_operator" />
                                   
                                </form>            
                            </div>
                            <!-- Настройки для оператора -->
                            </div>
							<div id="footer"></div>
			</div>
			
		</diV>
	</body>
	
</html>