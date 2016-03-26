<!DOCTYPE HTML>
<html>
<?php include('header.php'); ?>
<body id="pageBody">
<?php include('nav.php'); ?>
<div class="container">
    <div class="divPanel page-content">
        <!--Edit Main Content Area here-->
        <div class="row-fluid">
            <div class="span12" id="divMain">
    <?php 
include("connex.php");
// on crée la requête SQL
$id=$_GET["id"];
$resultat = $mysqli->query ("SELECT * FROM news where id='$id' LIMIT 1");
// tant qu'il y a un enregistrement, les instructions dans la boucle s'exécutent
while ($ligne = $resultat->fetch_assoc()) {
echo ' <br><br><h1> '.utf8_decode($ligne['titre']).'</h1>
<p><img class="img-polaroid" src="http://gondola.be/img_serveur/'.$ligne['img'].'"></p>
<p> '.utf8_decode($ligne['texte']).'</p>
<p style="font-size:x-small;">'.$ligne['datein'].'</p>';
}
?>	
                </div>
            </div>
			<!--End Main Content Area here-->
        <div id="footerInnerSeparator"></div>
    </div>

</div>		
<?php include('footer.php'); ?>
</body>
</html>