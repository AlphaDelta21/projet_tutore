<!doctype html>


<html>
<head>
<meta charset="utf-8">
<title>Sondage en amphithéâtre</title>
</head>

<body>


<div class="div_global">
<div class="div_img">
	
    <img src="images/student.png" class="img_iut"  alt=""/>
    
</div>


<form class="form_page1" action="question.php" method="post">
	<p class="p_code"> Entrez le code donné par votre professeur :  </p>
    <input name="txt_code" type="text" placeholder="Code professeur" required>	
    
    <br>
    
    <p class="p_code"> Recopiez ce captcha : <img  src="captcha.php" alt="Captcha" /><img id="refresh_button" src="images/refresh.png" alt="Refresh" Onclick="javascript:window.history.go(0)" /></p> 
    <input type="text" name="captcha" id="captcha" placeholder="Code captcha" required/>
    
	
    <br><br>
    <input type="submit" class="bouton_design" value="Continuer" />
</form>

<hr class="line_design">
<br>
</div>




<?php include "footer.php" ;?>


</body>
</html>

<java