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
            <form  type="file"  method="POST" action="upload_add.php?addmod=add" enctype="multipart/form-data">
    <p>
        <label>Titre:</label>
        <input type="text" name="titre" id="titre" size=60 maxlength="60" />
        <br>
        <label>Texte:</label>
        <textarea name="texte" id="texte"  maxlength="5000"></textarea>
        <br/>
  		<label for="icone">Image (JPG, PNG ou GIF) :</label>
        <br/>
        <input type="file" name="imagenews" id="imagenews" />
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576 " />
        <br/>
   <script type="text/javascript">
       $(function() {
               $("#datepicker").datepicker({ dateFormat: "yy-mm-dd" }).val()
       });
   </script>
<p>Date: <input type="text" id="datepicker" name="datepicker"></p>
	</br>
    <input type="submit" name="envoyer" value="Envoyer le fichier">
</form>

    </body>
</html>
