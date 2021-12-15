<?php
require_once 'connect.php';
?>

<form action = "19vek.php" method = "GET" >
<br>
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
	$result=mysqli_query($link,"SELECT
  film.nazvanie,
  janr.janr,
  strana.strana,
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
WHERE film.god_vixoda <= MAKEDATE(2001, 01)");
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
echo '<table border="1">';
echo '<tr>';
echo '<th>'."Название фильма".'</th>';
echo '<th>'."Жанр".'</th>';
echo '<th>'."Страна производства".'</th>';
echo '<th>'."Год выхода".'</th>';
echo '<th>'."Продолжительность (мин.)".'</th>';
echo '<th>'."Язык".'</th>';
echo '<th>'."Кол-во серий".'</th>';
echo '</tr>';
foreach ($rows as $row)
{
	
	echo '<tr>';
	echo '<td>'.$row['nazvanie'].'</td>';
	echo '<td>'.$row['janr'].'</td>';
	echo '<td>'.$row['strana'].'</td>';
	echo '<td>'.$row['god_vixoda'].'</td>';
    echo '<td>'.$row['prodolgitelnost'].'</td>';
	echo '<td>'.$row['iazik'].'</td>';
	echo '<td>'.$row['kol_vo_serii'].'</td>';
	echo '</tr>';
	
}

echo '</table>';
?>