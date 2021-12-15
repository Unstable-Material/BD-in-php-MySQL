<?php
require_once 'connect.php';
?>
<form action = "Dobavit_janr.php" method = "GET" >
 <style>
	body
	{
		background: #000 url(https://catherineasquithgallery.com/uploads/posts/2021-02/1614525342_177-p-belii-fon-khoroshee-kachestvo-210.jpg); 
		background-attachment: fixed; 
		background-repeat: repeat-x;
	}
 </style>
Жанры в базе данных:
<?php
$nomer = 0;

$result=mysqli_query($link,"SELECT
  janr.janr,
  janr.id_janr
FROM videoteka.janr");
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
foreach ($rows as $row)
{   
    $nomer = $nomer + 1;
	echo "<option>".($row['id_janr']);
	echo ". ";
	echo ($row['janr']."</option>");
}
?>
<br>

</form>

<form action = "Dobavit_janr.php" method = "GET">
<caption> Добавьте новый жанр</caption>
<br>   </br>
<table border="1">
<tr>
<th> Жанр </th>
</tr>
<tr>
<td> <input type = "text" name = "janr"> </td>
</tr>
</table>
<br>
<input type = "submit" name = "submit1" value = "Добавить жанр"><br>
<br>
</form>
<?php
if (($_GET['submit1']) && ($_GET[janr] != ""))
{
	$result = mysqli_query($link,"INSERT INTO videoteka.janr ( id_janr, janr)
  VALUES ($nomer + 1,'$_GET[janr]');");
}
?>