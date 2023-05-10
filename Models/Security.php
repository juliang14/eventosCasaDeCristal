<?php

class Security extends DB{

	public static function validate(){

		if(empty($_SESSION['UserAutenticate'])){
			header('location:?class=index&method=index');
		}

	}

}

?>