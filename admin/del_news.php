<?
include("../connex.php");
// on crée la requête SQL
$id=$_GET["id"];


$resultat = $mysqli->query ("DELETE FROM news where id='$id'");
// tant qu'il y a un enregistrement, les instructions dans la boucle s'exécutent

echo "<script type='text/javascript'>document.location.replace('gestion_news.php');</script>";



?>	


