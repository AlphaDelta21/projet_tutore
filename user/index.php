<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sondage en amphithéâtre</title>
</head>

<body>



<div class="div_img">
	<img src="images/iut-dijon.png" class="img_iut"  alt=""/>
</div>


<form class="form_page1" action="question.php" method="post">
	<p class="p_code"> Entrez le code donné par votre professeur :  <input name="txt_code" type="text" required></p>	
    <br>
    <label for="captcha">Recopiez ce captcha : <img src="captcha.php" alt="Captcha" /></label>
	<input type="text" name="captcha" id="captcha" />
    <br><br>
    <input type="submit" value="Continuer" />
</form>



<?php include "footer.php" ;?>
</body>
</html>