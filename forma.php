<?php
require_once 'connect.php';
?>
<html>
<head>
<br>
<br>
<br>
<br>
 	<title>Фоновое изображение с помощью CSS</title>
   <style>
	body
	{
		background: #000 url(https://krot.info/uploads/posts/2020-02/1580571181_51-p-foni-na-temu-kino-119.jpg);
		color: #fff; 
		background-attachment: fixed; 
		background-repeat: repeat-x; 
	}
 </style>
 </head>
 </html>
<th><center><font size="30" color="white" face="Comic Sans MS"> Меню "Видеотека" </font></center></th>
<br>
<form method="post" action="http://videoteka/film2.php">
<center><input type="submit" name="submitButton" value="Запрос 'Поиск по языку' " /></center>
</form>
<br>
<form method="post" action="http://videoteka/19vek.php">
<center><input type="submit" name="submitButton" value="Фильмы 20-го века" /></center>
</form>
<br>
<form method="post" action="http://videoteka/Dobavit_janr.php">
<center><input type="submit" name="submitButton" value="Добавить новый жанр" /></center>
</form>
<br>
<form method="post" action="http://videoteka/Poisk_po_navaniy.php">
<center><input type="submit" name="submitButton" value="Запрос 'Поиск по названию фильма'" /></center>
</form>
<br>
<form method="post" action="http://videoteka/ydalenie_janra.php">
<center><input type="submit" name="submitButton" value="Удалить жанр" /></center>
</form>