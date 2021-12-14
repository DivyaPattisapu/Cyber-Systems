<?php

	function Connection(){
		$server="127.0.0.1";
		$user="192.168.1.167";
		
		$db="ids";
	   	
		$connection = mysql_connect($server, $user);

		if (!$connection) {
	    	die('MySQL ERROR: ' . mysql_error());
		}
		
		mysql_select_db($db) or die( 'MySQL ERROR: '. mysql_error() );

		return $connection;
	}
?>
