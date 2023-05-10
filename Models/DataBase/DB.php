<?php
 // PDO::ATTR_ERRMODE
 // PDO::ERRMODE_EXCEPTION
class DB{

	public static function conectDatabase(){
		try {
			$pdoBase = new PDO('mysql:host=localhost;dbname=eventos_casa_de_cristal;charset=utf8','root','root');

			$pdoBase->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 

			return $pdoBase;
			
		}catch (Exception $e) {
			die('Error: '.$e->getMessage());
			echo 'Linea: '.$e->getLine();
		}finally{
			//$pdoBase= null;
		}
	}

}

?>