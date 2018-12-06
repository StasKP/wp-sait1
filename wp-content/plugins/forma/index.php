<?php
/**
* @package forma
* @version 1.0
*/
/*
Plugin Name: forma
Description: This is a simple plug-in to change your admin panel style.
Author: Stas
Version: 1.1
*/
 
/*  Copyright 2018  Stas  (email: awm-1992@mail.com)
 
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.
 
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
 
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function vform (){
	echo "<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js'></script>";

	/*echo "<script src='../wp-content/plugins/forma/ajax.js'></script>";*/

	echo "<form action='../wp-content/plugins/forma/function.php' method='post' id='ajax_form'>";
	echo "Имя";
	echo "<input type='text' style='border-radius: 50px;' name='username'>";
	echo "Мобилный телефон";
	echo "<input type='number' style='border-radius: 50px;' name='mobphone'>";
	echo "Домашний телефон";
	echo "<input type='number' style='border-radius: 50px;' name='domphone'>";
	echo "Email:";
	echo "<input type='email' style='border-radius: 50px;' name='eemail'>";
	echo "Сообщение";
	echo "<input type='text' style='border-radius: 50px;' name='message'>";
	echo "<center>Способ получения сообщения";
	echo "<br />";
	echo "<select name='sposob'style='border-radius: 50px;'><option>--Не выбрано--</option><option>Почта</option><option>SMS</option><option>WhatsApp</option></select>";
	echo "<br />";
	echo "<br />";
	echo "<input name='butt' id='btn' type='submit' value='Отправить' style='border-radius: 50px;'></center";
	echo "</form>";
	echo "<div id='result_form'></div>";	
}


add_action('admin_menu', function(){
	add_menu_page( 'Дополнительные настройки сайта', 'Обратная форма', 'manage_options', 'site-options', 'add_my_setting', '', 4 ); 
} );

function add_my_setting(){
$handle = new mysqli('localhost', 'mysql', 'mysql', 'wordpress');

 $query = "SELECT id,
username,
 mobphone,
 domphone,
 eemail,
 message
 FROM forma
 ORDER BY id DESC";
 $result = $handle->query($query);
 $numresult=$result->num_rows;
 echo '<p>Количество записей - '.$numresult;
 echo '<table border=1>';
 echo '<tr><th>№</th>';
 echo '<th>Имя</th>';
 echo '<th>Мобилный телефон</th>';
 echo '<th>Домашний телефон</th>';
 echo '<th>Email</th>';
 echo '<th>Сообщение</th>';
 echo '<th></th>';

 for ($i=0;$i<$numresult;$i++)
 {
 $row=$result->fetch_assoc();
 echo '<tr><td>'.$row['id'];
 echo '</td><td>'.$row['username'];
 echo '</td><td>'.$row['mobphone'];
 echo '</td><td>'.$row['domphone'];
 echo '</td><td>'.$row['eemail'];
 echo '</td><td>'.$row['message']; 
 	echo '</td><td>';
 echo '<form action="../wp-content/plugins/forma/delform.php" method="post">';
 echo '<input type="hidden" name="id" value="'.$row['id'].'">';

 echo '<input type="submit" value="Удалить">';
 echo '</form>';
 }
 echo '</table>';
}

/*function delforma(){
 $id = $_REQUEST['id'];
 $handle = new mysqli('localhost', 'mysql', 'mysql', 'wordpress');

 $query = "DELETE FROM forma WHERE id=$id";
 $result = $handle->query($query);
 if ($result) echo "Данные удалены";
 if (!$result) echo "Ошибка удаления данных";

}*/

add_shortcode('vform', 'vform' );
?>