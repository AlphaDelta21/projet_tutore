<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sandage amphithéâtre</title>
</head>

<body>

<div class="div_img">
	<img src="images/iut-dijon.png" class="img_iut"  alt=""/>
</div>

<form class="form_page1">
	<p class="p_code"> Entrez le code donné par votre professeur :  <input class="txt_code" type="text" required></p>	
    <br>
    <label for="captcha">Recopiez le mot : <img src="captcha.php"></label>
	<input type="text" name="captcha" id="captcha" />
    <br>
    <input type="submit" value="Continuer" />
</form>



<?php include "footer.php" ;?>

</body>
</html>