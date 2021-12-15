<?php
require_once'connect.php';
?>
<form action="Poisk_po_navaniy.php" method="GET">
 <style>
	body
	{
		background: #000 url(https://catherineasquithgallery.com/uploads/posts/2021-02/1614525342_177-p-belii-fon-khoroshee-kachestvo-210.jpg); 
		background-attachment: fixed; 
		background-repeat: repeat-x; 
	}
 </style>
 Введите название фильма:<input type="text" name="Namefilm"><br>
<input type="submit" name="submit" value="Поиск"><br>
</form>
<?php
if($_GET['submit'])
{
	$result=mysqli_query($link,"SELECT
  film.nazvanie,
  janr.janr,
  ispolnitel_glavnoi_roli.familia_m,
  ispolnitelnitsa_glavnoi_roli.familia_j,
  strana.strana,
  glavnii_regiser.familia_r,
  film.god_vixoda,
  film.prodolgitelnost,
  iaziki.iazik,
  film.kol_vo_serii
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
WHERE film.nazvanie = '$_GET[Namefilm]'");
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
echo '<table border="1">';
echo '<tr>';
echo '<th>'."Название фильма".'</th>';
echo '<th>'."Жанр".'</th>';
echo '<th>'."Исполниель главной роли".'</th>';
echo '<th>'."Исполниельница главной роли".'</th>';
echo '<th>'."Страна".'</th>';
echo '<th>'."Главный режисёр".'</th>';
echo '<th>'."Год выхода".'</th>';
echo '<th>'."Продолжительность".'</th>';
echo '<th>'."Язык".'</th>';
echo '<th>'."Кол-во серий".'</th>';
echo '</tr>';
foreach ($rows as $row)
{
	echo '<tr>';
	echo '<td>'.$row['nazvanie'].'</td>';
	echo '<td>'.$row['janr'].'</td>';
	echo '<td>'.$row['familia_m'].'</td>';
	echo '<td>'.$row['familia_j'].'</td>';
	echo '<td>'.$row['strana'].'</td>';
	echo '<td>'.$row['familia_r'].'</td>';
	echo '<td>'.$row['god_vixoda'].'</td>';
	echo '<td>'.$row['prodolgitelnost'].'</td>';
	echo '<td>'.$row['iazik'].'</td>';
	echo '<td>'.$row['kol_vo_serii'].'</td>';
	echo '</tr>';

}
echo '</table>';
}
?>