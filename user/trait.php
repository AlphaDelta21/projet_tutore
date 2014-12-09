<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> Traitement </title>
</head>

<body>
<div class="div_img">
	
    <img src="images/student.png" class="img_iut"  alt=""/>

<?php
if(isset($_POST['rep']))
{
	$R = $_POST['rep'];
	
	
	echo '<p class="p_code">Merci d\'avoir voté, vous avez choisi la réponse :"<i>'.$R.'</i>".</p>';
	echo '<p class="p_code">Votre professeur vous communiquera la réponse sous peu.</p>';
}
else
{
	echo '
	<img  src="images/stop.png" alt="stop" />
	<br>
	Vous n\'avez pas sélectionné de réponse, veuillez recommencer.
	';	
}
?>

<br>

<a href="index.php"> <input type="submit" class="bouton" value="retour au menu principal" /></a>
</div>
<hr class="line_design">




<?php include "footer.php" ;?>
</body>
</html>