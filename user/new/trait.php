<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> Traitement </title>
</head>

<body>
<div class="div_img">
	<img src="images/iut-dijon.png" style="width:10%;" class="img_iut"  alt=""/><br>

<?php
if(isset($_POST['rep']))
{
	$R = $_POST['rep'];
	
	
	echo '<p class="p_code">Merci d\'avoir voté, vous avez choisi la réponse :"<i>'.$R.'</i>".</p>';
	echo '<p class="p_code">Voter professeur vous communiquera la réponse sous peu.</p>';
}
else
{
	echo 'Vous n\'avez pas sélectionné de réponse, veuillez recommencer.';	
}
?>
<br>
<a href="index.php"> Retour au menu</a>
</div>





<?php include "footer.php" ;?>
</body>
</html>