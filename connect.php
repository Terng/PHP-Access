<?php
	$db_username = ''; //username
	$db_password = ''; //password
	// path 
	$conn  = realpath("access/AgeRange.mdb");
	$conn  = new PDO("odbc:Driver={Microsoft Access Driver (*.mdb)};
					  DBQ=$conn; Uid=$db_username; Pwd=$db_password;");

?>