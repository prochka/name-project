<?php
header("Content-type: text/html; charset=UTF-8"); session_start(); if(isset($_POST['install'])){ if(empty($_POST['login_mysql']) OR empty($_POST['host_mysql']) OR empty($_POST['db_name'])){ $_SESSION['error'] = "Заполните все поля"; header('Location: install.php'); exit; }else{ if(!@mysql_connect($_POST['host_mysql'], $_POST['login_mysql'], $_POST['password_mysql'])){ $_SESSION['error'] = "Не правильные данные для mysql, попробуйте еще раз"; header('Location: install.php'); exit; } if(!mysql_select_db($_POST['db_name'])){ $_SESSION['error'] = "Не правильные имя для базы данных"; header('Location: install.php'); exit; } $data = "<?php define('DSN', 'mysql:dbname={$_POST['db_name']};host={$_POST['host_mysql']}'); define('DBUSER', '{$_POST['login_mysql']}'); define('DBPASS', '{$_POST['password_mysql']}');"; $mysql_string = file_get_contents('class/mysql.php'); $new_mysql = $data.' '.$mysql_string; if(!file_put_contents('class/mysql.php', $new_mysql)){ errorMessage("Не удалось сохранить файлы конфигураций, пожалуйста обратитесь в службу технической поддержки клиентов"); } } if(empty($_POST['admin_login']) OR empty($_POST['admin_password']) OR empty($_POST['admin_email'])){ $_SESSION['error'] = "Заполните все поля"; header('Location: install.php'); exit; }else{ $data = "<?php define('ADMIN_LOGIN', '{$_POST['admin_login']}'); define('ADMIN_PASSWORD', '{$_POST['admin_password']}'); define('OFFLINE_EMAIL', '{$_POST['admin_email']}');"; file_put_contents('config/admin_config.php', $data); } $sql = "CREATE TABLE IF NOT EXISTS ok_operators(
	operator_id SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	operator_login VARCHAR(50) NOT NULL,
	operator_password VARCHAR(50) NOT NULL,
	operator_name VARCHAR(50) NOT NULL,
	operator_surname VARCHAR(50) NOT NULL,
	operator_limit TINYINT(100) NOT NULL DEFAULT 99,
	operator_rating DECIMAL DEFAULT 0,
	operator_photo VARCHAR(60) NOT NULL,
	operator_otdel SMALLINT NOT NULL,
	operator_online ENUM('0','1') DEFAULT '0',
	operator_connected TINYINT(100) NOT NULL DEFAULT 0,
	operator_messages VARCHAR(250) NOT NULL DEFAULT 'Здравствуйте, могу я Вам чем то помочь?',
	operator_ltime INT(10) NOT NULL,
	KEY operator_otdel (operator_id)
)ENGINE=MyISAM"; mysql_query($sql); $sql = "CREATE TABLE IF NOT EXISTS ok_group(
	group_id SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	group_name VARCHAR(100) NOT NULL	
)ENGINE=MyISAM"; mysql_query($sql); $sql = "CREATE TABLE IF NOT EXISTS ok_users(
	user_id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	user_ip BIGINT(12) NOT NULL,
	user_name VARCHAR(60) NOT NULL DEFAULT 'Клиент',
	user_date VARCHAR(20) NOT NULL,
	user_online ENUM('0','1') DEFAULT 1,
	KEY user_id (user_id),
	KEY user_ip (user_ip)
)ENGINE=MyISAM"; mysql_query($sql); $sql = "CREATE TABLE IF NOT EXISTS ok_messages(
	id_mess INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_user INT(10) NOT NULL,
	is_for INT(10) NOT NULL,
	wr_date INT(10) NOT NULL,
	messages TEXT NOT NULL,
	is_from ENUM('0','1','2') NOT NULL,
	KEY id_user (id_user),
	KEY is_for (is_for),
	KEY wr_date (wr_date)
)ENGINE=MyISAM"; mysql_query($sql); $sql = "CREATE TABLE IF NOT EXISTS ok_phrases(
	id_phrases INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_operator SMALLINT NOT NULL,
	phrases VARCHAR(250) NOT NULL
)ENGINE=MyISAM"; mysql_query($sql); $sql = "CREATE TABLE IF NOT EXISTS ok_voting(
	id_operator SMALLINT NOT NULL,
	id_user INT(10) NOT NULL,
	voting ENUM('0','1') NOT NULL
)ENGINE=MyISAM"; mysql_query($sql); $sql = "CREATE TABLE IF NOT EXISTS ok_blacklist(
	ip_user BIGINT(12) NOT NULL,
	id_operator SMALLINT NOT NULL,
	add_date INT(10) NOT NULL,
	KEY ip_user (ip_user)
)ENGINE=MyISAM"; mysql_query($sql); $sql = "CREATE TABLE IF NOT EXISTS ok_files(
	file_id INT(12) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	file_name VARCHAR(250) NOT NULL,
	file_path VARCHAR(100) NOT NULL,
	file_size INT(12) NOT NULL,
	file_date INT(11) NOT NULL
)ENGINE=MyISAM"; mysql_query($sql); errorMessage('Онлайн-консультант успешно установлен! Создайте оператора и начните консультировать своих клиентов. <a href="./index.php">Вход в панель</a>'); } $version = phpversion(); $version = explode('.', $version); if($version[0] < 5 OR $version[1] < 2){ errorMessage('Установка не удалась. Версия php ниже 5.2, пожалуйста обратитесь в службу технической поддержки клиентов <a href="http://online-consultant">http://online-consultant</a>'); } if(!extension_loaded('json')){ errorMessage('Установка не удалась. Не установлено расширение json, пожалуйста обратитесь в службу технической поддержки клиентов <a href="http://online-consultant">http://online-consultant</a>'); } if(!extension_loaded('iconv')){ errorMessage('Установка не удалась. Не установлено расширение iconv, пожалуйста обратитесь в службу технической поддержки клиентов <a href="http://online-consultant">http://online-consultant</a>'); } if(!extension_loaded('PDO')){ errorMessage('Установка не удалась. Не установлено расширение PDO, пожалуйста обратитесь в службу технической поддержки клиентов <a href="http://online-consultant">http://online-consultant</a>'); } function errorMessage($mess){ echo '<div style="margin: 25px auto;width: 700px;font-size: 17px;font-family: Tahoma;background-color: #FED9BC;border-radius: 5px;padding: 15px;">'.$mess.'</div>'; exit; } ?>
<!DOCTYPE html>
<html>
    
    <head>
        <title>Установка оналайн-консультанта</title>
        <style type="text/css">
            *{
                margin: 0;
                padding: 0;
            }
            #contayner{
                width: 900px;
                
                margin: 0 auto;
                
                background-color: #FFF;
            }
            #head{
                width: 100%;
                padding: 16px 0;
                
                background-color: #272822;
            }
            #set_left{
                float:left;
                width: 430px;
            }
            #set_right{
                float:right;
                width: 430px;
            }
            #head h1{
                text-align: center;
                color: #087CF2;
                font-size: 30px;
                text-align: center;
                font-weight: bold;
                font-family: Tahoma;
            }
            .settings{
                padding: 0;
                margin-top: 30px;
                font-size: 13px;
                font-family: Tahoma;
                font-weight: bold;
                
            }
            .settings h1{
                color: #6085A4;
                text-align: center;
                margin-bottom: 20px;
                font-size: 19px;
                
            }
            .settings span{
                color: #696969;
                
            }
            br{
                margin-bottom: 4px;
            }
            .settings input{
                width: 300px;
                height: 35px;
                padding: 3px;
                margin-bottom: 10px;
                font-size: 18px;
            }
            #instal{
                padding: 10px 15px;
                margin-left: 290px;
                margin-top: 30px;
                margin-bottom: 20px;
                border: 1px solid #C1CFDD;
                cursor: pointer;
                background-color: #666;
                color: white;
                font-size: 17px;
            }
            #instal:hover{
                background-color: #069;
            }
            .login_style .field {
	margin: 20px 0 8px;
}
.login_style .field label {
	display: block;
	margin: 0 0 5px;
}
.login_style .field .input {
  border-radius: 4px;
}
.login_style .field input {
  font: 12px Arial, Tahoma, sans-serif;
	color: #444;
	width: 262px;
	padding: 9px 13px;
  	border: 1px solid #D2D9DC;
	border-radius: 3px;
	box-shadow: inset 2px 2px 6px #EBEBEB, 0 0 0 5px #F7F9FA;
	outline: none;
}
.login_style .field2 input:focus {
	border-color: #B7D4EA;
	box-shadow: inset 2px 2px 6px #EBEBEB, 0 0 4px #D0E6F6, 0 0 0 5px #F2F8FC;
}
.reg_style .field2 {
	margin: 15px 0 8px;
}
.reg_style .field2 label {
	display: block;
	margin: 0 0 5px;
	font-size: 13px;
	font-family: Arial;
	font-weight: bold;
}
.reg_style .field2 .input {
  border-radius: 4px;
}
.reg_style .field2 input {
  	font: 14px Arial, Tahoma, sans-serif;
	color: #444;
	width: 350px;
	padding: 12px 13px;
  	border: 1px solid #D2D9DC;
	border-radius: 3px;
	box-shadow: inset 2px 2px 6px #EBEBEB, 0 0 0 5px #F7F9FA;
	outline: none;
}
.reg_style .field2 input:focus {
	border-color: #B7D4EA;
	box-shadow: inset 2px 2px 6px #EBEBEB, 0 0 4px #D0E6F6, 0 0 0 5px #F2F8FC;
}
#malsi4{
	margin-top: 25px;
	font-size: 17px;
	font-family: Tahoma;
	background-color: #FED9BC;
	border-radius: 5px;
	padding: 15px;
}
        </style>
    </head>
    
    <body>
        <div id="head"><h1>Установка онлайн-консультанта</h1></div>
        <div id="contayner">
            <p id="malsi4">Ваш хостинг поддерживает скрипт online-консультанта, пожалуйста, заполните все поля, и нажмите на кнопку для установки. Если у вас возникнут вопросы, обратитесь в службу технической поддержки клиентов <a href="http://online-consultant">http://online-consultant</a></p>
            <?php
 if(isset($_SESSION['error'])){ echo '<br /><p style="text-align: center; color: red; font-size: 18px;">'.$_SESSION['error'].'</p>'; unset($_SESSION['error']); } ?>
            
            <form id="register_form" class="reg_style" action="" method="POST">
                <div id="set_left">
                    <div style="float: right;">
                <div class="settings"><h1>Конфигурация базы данных</h1></div>
                <div class="field2">
                        <label>Пользователь mysql:</label>
                        <div class="input"><input type="text" name="login_mysql" /></div>
                </div>

                <div class="field2">
                        <label>Пароль mysql:</label>
                        <div class="input"><input type="text" name="password_mysql" /></div>
                </div>

                <div class="field2">
                        <label>Сервер mysql:</label>
                        <div class="input"><input type="text" name="host_mysql" /></div>
                </div>
                <div class="field2">
                        <label>Имя базы данных:</label>
                        <div class="input"><input type="text" name="db_name" /></div>
                </div>
                </div>
                </div>
                <div id="set_right">
                    <div style="float: left;">
                <div class="settings"><h1>Данные администратора</h1></div>
                
                <div class="field2">
                        <label>Логин администратора:</label>
                        <div class="input"><input type="text" name="admin_login" /></div>
                </div>

                <div class="field2">
                        <label>Пароль администратора:</label>
                        <div class="input"><input type="text" name="admin_password" /></div>
                </div>

                <div class="field2">
                        <label>E-mail для сообщений из формы:</label>
                        <div class="input"><input type="text" name="admin_email" /></div>
                </div>
                    </div>
                </div>
                        <input type="submit" name="install" id="instal" value="Установить online-консультант на сайт" />
              
            </form>
     
        </div>
    </body>
</html>