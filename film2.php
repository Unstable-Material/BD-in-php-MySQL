<?php
require_once 'connect.php';
?>

<form action = "film2.php" method = "GET" >
Язык: <select name="Namestatus">
<?php
$result=mysqli_query($link,"SELECT
  iaziki.iazik
FROM videoteka.iaziki");
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
foreach ($rows as $row)
{
	echo"<option>". ($row['iazik']."</option>");
}
?>
</select><br>
<input type="submit" name="submit" value="Поиск"><br>
 <style>
	body
	{
		background: #000 url(https://catherineasquithgallery.com/uploads/posts/2021-02/1614525342_177-p-belii-fon-khoroshee-kachestvo-210.jpg); 
		background-attachment: fixed; 
		background-repeat: repeat-x; 
	}
 </style>
</form>
<?php
if ($_GET['submit'])
{
	$result=mysqli_query($link,"SELECT
  film.id_film,
  film.nazvanie,
  strana.strana,
  film.god_vixoda,
  iaziki.iazik
FROM videoteka.film
  INNER JOIN glavnii_regiser
    ON film.id_regiser = glavnii_regiser.id_regiser
  INNER JOIN iaziki
    ON film.id_iazik = iaziki.id_iazik
  INNER JOIN ispolnitel_glavnoi_roli
    ON film.id_ispolnitel = ispolnitel_glavnoi_roli.id_ispolnitel
  INNER JOIN ispolnitelnitsa_glavnoi_roli
    ON film.id_ispolnitelnitsa = ispolnitelnitsa_glavnoi_roli.id_ispolnitelnitsa
  INNER JOIN janr
    ON film.id_janr = janr.id_janr
  INNER JOIN strana
    ON film.id_strana = strana.id_strana
WHERE iaziki.iazik = '$_GET[Namestatus]'");
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
echo '<table border="1">';
echo '<tr>';
echo '<th>'."Название фильма".'</th>';
echo '<th>'."Страна производства".'</th>';
echo '<th>'."Год выхода".'</th>';
echo '<th>'."Язык".'</th>';
echo '</tr>';
foreach ($rows as $row)
{
	
	echo '<tr>';
	echo '<td>'.$row['nazvanie'].'</td>';
	echo '<td>'.$row['strana'].'</td>';
	echo '<td>'.$row['god_vixoda'].'</td>';
	echo '<td>'.$row['iazik'].'</td>';
	echo '</tr>';
	
}

}
echo '</table>';
?>