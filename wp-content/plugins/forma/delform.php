<?php
 $id = $_REQUEST['id'];
 $handle = new mysqli('localhost', 'mysql', 'mysql', 'wordpress');

 $query = "DELETE FROM forma WHERE id=$id";
 $result = $handle->query($query);
 if ($result) echo "Данные удалены";
 if (!$result) echo "Ошибка удаления данных";
 //header("Location: http://wordpress/wp-admin/admin.php?page=site-options");
 exit("<meta http-equiv='refresh' content='0; url= $_SERVER[PHP_SELF]'>");
 ?>