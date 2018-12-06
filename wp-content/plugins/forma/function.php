<?php
	$username = $_REQUEST['username'];
	$mobphone = $_REQUEST['mobphone'];
	$domphone = $_REQUEST['domphone'];
	$eemail = $_REQUEST['eemail'];
	$message = $_REQUEST['message'];
	$sposob = $_REQUEST['sposob'];

	/*$username = $_POST['username'];
	$mobphone = $_POST['mobphone'];
	$domphone = $_POST['domphone'];
	$eemail = $_POST['eemail'];
	$message = $_POST['message'];*/

	$handle = new mysqli('localhost', 'mysql', 'mysql', 'wordpress');
	$query = "INSERT INTO forma (username, mobphone, domphone, eemail, message,sposob) 
			VALUES ('$username', $mobphone, $domphone, '$eemail', '$message','$sposob')";
	$result = $handle->query($query);
	
	if ($result) echo "Данные сохранены";
 	if (!$result) echo "Ошибка сохранения данных, вы ввели не все данные";
?>
<br>
<form action="http://wordpress/obr-form/">
	<input type="submit" name="kforme" value="Вернуться к форме">
</form>