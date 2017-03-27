<?php define('DSN', 'mysql:dbname=testscript;host=127.0.0.1:3306'); define('DBUSER', 'mysql'); define('DBPASS', 'mysql'); 

class Mysql{
    
    public static $_instance = null;
    
    public static function getInstance(){
	if(self::$_instance === null){
		try{
                    self::$_instance = new PDO(DSN, DBUSER, DBPASS);
                }catch(PDOException $pdoe){
                    die('Не удалось подключиться: '.$pdoe->getMessage());
                }
                
                //Установка кодировки в UTF-8
		//self::$_instance->query("SET NAMES cp1251");
	}
		
	return self::$_instance;
    }
    
    public static function filterSQL($data){
        return self::getInstance()->quote($data); // Очищаем данные
    }
    
    private function __clone(){
	trigger_error('Клонирование класса запрещено.', E_USER_ERROR);
    }
}
