<script language="javascript">
function checkMe() {
    if (confirm("Voulez-vous vraiment modifier ou supprimer cette news ?")) {
        return true;
    } else {
        return false;
    }
}
</script>



<div class="container">

    <div class="divPanel page-content">
        <!--Edit Main Content Area here-->
        <div class="row-fluid">

                <div class="span12" id="divMain">


					    <br><br><h1>La gestion des News</h1>

		<?php

include ("../connex.php");
// on crée la requête SQL

$resultat = $mysqli->query ("SELECT * FROM news order by id desc");
// tant qu'il y a un enregistrement, les instructions dans la boucle s'exécutent
while ($ligne = $resultat->fetch_assoc()) {
echo '<br><a href="update_news.php?id='.$ligne['id'].'" onClick="return checkMe()">Modification</a> &nbsp;|&nbsp; <a href="del_news.php?id='.$ligne['id'].'" onClick="return checkMe()">Suppression</a><b> '.utf8_decode($ligne['titre']).'</b> du '.$ligne['datein'];


}
?>
					    <br><br><h1>Ajout d'une news</h1>

<?

include ("add_news.php");

?>		



                </div>

            </div>
			<!--End Main Content Area here-->

        <div id="footerInnerSeparator"></div>
    </div>

</div>
