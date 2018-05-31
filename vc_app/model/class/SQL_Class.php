<?php
$MySqliUser = "root";
$MySqliPassWord = "rootroot";
$MySqliDB = "bayati";

@$mysqli2 = new mysqli( "localhost", $MySqliUser, $MySqliPassWord,  $MySqliDB);
if( @$mysqli2->connect_error ){
	// Return Error SQL 1 For No Connection
	echo "EROOR SQL 1";
	exit;
}
mysqli_set_charset($mysqli2 ,"utf8");


@$Sql_Connection = new SQL_Select_Class() ;
@$Sql_Connection -> DB_Connection = $mysqli2;



// SQL Queries Class
class SQL_Select_Class {
	public $HostName;
	public $UserName;
	public $Password;
	public $Database;

	public function Select_Query( $Tabel, $Field, $Where ){
		$query = "SELECT $Field FROM `$Tabel` $Where";
		$query_conect = $this -> DB_Connection -> query($query);
		$query_conect_save = $query_conect;
		return($query_conect_save);
	}


	public function Insert_Query( $Tabel, $FieldValue, $Where){
		foreach($FieldValue as $Key=>$Value) {
			$Values[]=$Value;
			$Keys[] = $Key;
		}
		$string = $Values;
		$doKeys = 0;
		foreach($string as $Secur) {
			$Secur_String =  @$this -> DB_Connection ->real_escape_string($Secur);
			$Secur_String = @strip_tags($Secur_String);
			$Secur_String = @htmlspecialchars($Secur_String, ENT_COMPAT, 'UTF-8');
			$Secur_String = @trim($Secur_String);
			$Secur_String = @stripslashes($Secur_String);
			$New_String[] = $Secur_String;
			$doKeys++;
		}
		$strings = "'".implode("','",$New_String)."'";
		$query = "INSERT INTO `$Tabel` (".implode(",",$Keys).") VALUES ($strings) $Where";
		$query_conect = $this -> DB_Connection -> query($query);
		return($query_conect);
	}


	public function Update_Query( $Tabel, $FieldValue, $Where){
		$string = $FieldValue;
		foreach($string as $Key=>$Value) {
			$Secur_String = strip_tags($Value);
			$Secur_String = $this -> DB_Connection ->real_escape_string($Secur_String);
			$Secur_String = @strip_tags($Secur_String);
			$Secur_String = @htmlspecialchars($Secur_String, ENT_COMPAT, 'UTF-8');
			$Secur_String = @trim($Secur_String);
			$Secur_String = @stripslashes($Secur_String);
			$Secur_String = $Key."='".$Secur_String."'";
			$New_String[] = $Secur_String;
		}
		$strings = implode(",",$New_String);
		$query = "UPDATE `$Tabel` SET $strings $Where";
		$query_conect = $this -> DB_Connection -> query($query);
		$query_conect_save = $query_conect;
		return($query_conect_save);
	}

}
?>
