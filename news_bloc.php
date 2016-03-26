<div class="container">
    <div class="divPanel page-content">
        <!--Edit Main Content Area here-->
        <div class="row-fluid">
                <div class="span12" id="divMain">
					    <br><br><h1>Les news</h1>
		<?php

include ("connex.php");
// on crée la requête SQL

$resultat = $mysqli->query ("SELECT * FROM news order by id desc");
// tant qu'il y a un enregistrement, les instructions dans la boucle s'exécutent
while ($ligne = $resultat->fetch_assoc()) {
echo '<br><b><a href="detail_news.php?id='.$ligne['id'].'"> '.utf8_decode($ligne['titre']).'</a></b>';
}
?>		
                </div>
            </div>
			<!--End Main Content Area here-->
        <div id="footerInnerSeparator"></div>
    </div>
</div>