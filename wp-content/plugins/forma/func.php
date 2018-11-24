<?php
	echo "Текст";
	$username = $_REQUEST['username'];
	$mobphone = $_REQUEST['mobphone'];
	$domphone = $_REQUEST['domphone'];
	$message = $_REQUEST['message'];
	if (($username == null)||($mobphone == null)||($domphone == null)||($message == null)){
		echo "<p> Вы ввели не все данные";
	} else {
		echo "Вы все данные ввели";
	}
?>