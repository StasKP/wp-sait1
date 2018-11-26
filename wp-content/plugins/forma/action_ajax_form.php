<?php
	



if (isset($_POST["username"]) && isset($_POST["mobphone"]) && isset($_POST["domphone"]) && isset($_POST["eemail"]) && isset($_POST["message"])) { 

	// Формируем массив для JSON ответа
    $result = array(
    	'username' => $_POST["username"],
    	'mobphone' => $_POST["mobphone"],
    	'domphone' => $_POST["domphone"],
    	'eemail' => $_POST["eemail"],
    	'message' => $_POST["message"]
    ); 

    // Переводим массив в JSON
    echo json_encode($result); 
}

?>