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
	echo "<form action='../wp-content/plugins/forma/func.php' method='post'>";
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
	echo "<br />";
	echo "<center><input name='butt' type='submit' value='Отправить' style='border-radius: 50px;'></center";
	echo "</form>";	
}


add_shortcode('vform', 'vform' );
?>