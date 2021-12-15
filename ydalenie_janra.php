<?php
require_once'connect.php';
?>
<form action="ydalenie_janra.php" method="GET">
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
Введите какой жанр вы хотите удалить:<input type="text" name="Namejanr"><br>
<input type="submit" name="submit" value="Удалить"><br>
</form>
<?php
if($_GET['submit'])
{
	$result=mysqli_query($link,"DELETE LOW_PRIORITY QUICK
	FROM videoteka.janr WHERE janr= '$_GET[Namejanr]'
	LIMIT 100");
}
?>