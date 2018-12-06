<?php
 $id = $_REQUEST['id'];
 $handle = new mysqli('localhost', 'mysql', 'mysql', 'wordpress');

 $query = "DELETE FROM forma WHERE id=$id";
 $result = $handle->query($query);
 if ($result) echo "Данные удалены";
 if (!$result) echo "Ошибка удаления данных";

 ?>
 <form action="http://wordpress/wp-admin/">
 	<input type="submit" name="kzapis" value="Назад">
 </form>