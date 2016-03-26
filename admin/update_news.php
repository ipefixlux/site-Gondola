<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
   <? 
   $id=$_GET["id"]; 
   ?>
 
            <form  type="file"  method="POST" action="upload_add.php?addmod=mod&id=<?echo $id; ?>" enctype="multipart/form-data">
    <p>
<?
include("../connex.php");
// on crée la requête SQL
//$id=$_GET["id"];


$resultat = $mysqli->query ("select * FROM news where id='$id'");
// tant qu'il y a un enregistrement, les instructions dans la boucle s'exécutent

while ($ligne = $resultat->fetch_assoc()) {
/*echo ' <br><br><h1> '.utf8_decode($ligne['titre']).'</h1>
<p><img class="img-polaroid" src="http://gondola.be/img_serveur/'.$ligne['img'].'"></p>
<p> '.utf8_decode($ligne['texte']).'</p>
<p style="font-size:x-small;">'.$ligne['datein'].'</p>';

*/

$id=$ligne['id'];
$fp=$ligne['img'];
echo "ici".$fp; 
?>	


        <label>Titre :</label><input type="text" value="<? echo utf8_decode($ligne['titre']); ?>"name="titre" id="titre" size=60 maxlength="60" /> <br>
		<label>Texte :</label><textarea name="texte"  id="texte"  maxlength="5000"><? echo utf8_decode($ligne['texte']); ?></textarea><br/>
		<p><img class="img-polaroid" src="http://gondola.be/img_serveur/<? echo $fp; ?>"></p>
		 <input type="hidden" name="fichier_db" value="<? echo $fp; ?>" /><br/>

        <label for="icone">Changer l'image (JPG, PNG ou GIF) ? :</label><br/>
		<input type="file" name="imagenews" id="imagenews" />
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576" /><br/>
<script type="text/javascript">
       $(function() {
               $("#datepicker").datepicker({ dateFormat: "yy-mm-dd" }).val()
       });
</script>
<p>Date: <input type="text" value="<? echo utf8_decode($ligne['datein']); ?>"  id="datepicker" name="datepicker"></p></br>
<? //echo $id; ?>
<input type="submit" name="envoyer" value="Envoyer le fichier">

<?

}
?>
</form>
</body>
</html>
