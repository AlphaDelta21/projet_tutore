<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> Question </title>
</head>

<body>
<div class="div_img">
	<img src="images/iut-dijon.png" style="width:10%;" class="img_iut"  alt=""/>

<?php
session_start();

if(isset($_POST['captcha']) && isset($_POST['txt_code']))
{
	if ($_POST['captcha']==$_SESSION['captcha'])
    { 
	echo'
	<form class="form_page2" action="trait.php" method="post">
        <p class="p_code"> Question de votre professeur :  <i>"la question ici"</i></p>	
        <br>
        <input class="radio" type="radio" name="rep" value="Réponse n°1" required /> <label for="oui">Réponse n°1</label>
        <input class="radio" type="radio" name="rep" value="Réponse n°2" required /> <label for="non">Réponse n°2</label>
        <br>
        <input class="radio" type="radio" name="rep" value="Réponse n°3" required /> <label for="oui">Réponse n°3</label>
        <input class="radio" type="radio" name="rep" value="Réponse n°4" required /> <label for="non">Réponse n°4</label> 
    	<br><br>
    	<input type="submit" value="Valider" />
    </form>
	';
	}
	else
	{
		echo 'coucou';	
	}
}
?>




</div>
<?php include "footer.php" ;?>
</body>
</html>