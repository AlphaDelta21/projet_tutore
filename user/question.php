<?php session_start();?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> Question </title>
</head>

<body>

<div class="div_img">
<?php require "../classes/QuestionClass.php" ;?>
	
    <img src="images/student.png" class="img_iut"  alt=""/>


<?php


if(isset($_POST['captcha']) && isset($_POST['txt_code']))
{
	$code = $_POST['txt_code'];
	$question = new Question();
	
	$question->afficher($code);
	
	$resultat = $question->toArray();
	
	$reponse = $question->getReponse($question->getIdQuestion());
	
	
	
	
	if ($_POST['captcha']==$_SESSION['captcha'] && $question->afficher($code) != false)
    { 
	echo'
	<form class="form_page2" action="trait.php" method="post">
<<<<<<< HEAD
        <p class="p_code"> Question de votre professeur :  <i>'.$resultat[2].'</i></p>	
			<br>
				<input class="radio" type="radio" name="rep" value="'.$reponse[0].'" required /> <label for="oui">'.$reponse[0].'</label>
				<input class="radio" type="radio" name="rep" value="'.$reponse[1].'" required /> <label for="non">'.$reponse[1].'</label>
				
				<br>
				
				<input class="radio" type="radio" name="rep" value="'.$reponse[2].'" required /> <label for="oui">'.$reponse[2].'</label>
				<input class="radio" type="radio" name="rep" value="'.$reponse[3].'" required /> <label for="non">'.$reponse[3].'</label> 
=======
        <p class="p_code"> Question de votre professeur :  <i>"la question ici"</i></p>	
			<br>
				<input class="radio" type="radio" name="rep" value="Réponse n°1" required /> <label for="oui">Réponse n°1</label>
				<input class="radio" type="radio" name="rep" value="Réponse n°2" required /> <label for="non">Réponse n°2</label>
				
				<br>
				
				<input class="radio" type="radio" name="rep" value="Réponse n°3" required /> <label for="oui">Réponse n°3</label>
				<input class="radio" type="radio" name="rep" value="Réponse n°4" required /> <label for="non">Réponse n°4</label> 
>>>>>>> 6490a593d3f7e233c1d6e368967b6f70ee46f1f0
			<br><br>
    	<input type="submit" class="bouton_design" value="Valider" />
    </form>
	';
	}
	
	else if ($question->afficher($code) == false)
	{
		echo '
		<img  src="images/stop.png" alt="stop" />
			<br><br>
			Le captcha et/ou le code professeur n\'ont pas été correctement tapés, veuillez recommencer.
			<br><br>
		<a href="index.php"> <input type="submit" class="bouton" value="retour au menu principal" /></a>';		
	}
	
	else
	{
		echo '
		<img  src="images/stop.png" alt="stop" />
			<br><br>
<<<<<<< HEAD
			Le captcha et/ou le code professeur n\'ont pas été correctement tapés, veuillez recommencer.
			<br><br>
		<a href="index.php"> <input type="submit" class="bouton" value="retour au menu principal" /></a>';	
=======
			Le captcha n\'a pas été correctement tapé, veuillez recommencer.
			<br><br>
		<a href="index.php"> <input type="submit" class="bouton" value="retour au menu principal" /></a>';
		
		
>>>>>>> 6490a593d3f7e233c1d6e368967b6f70ee46f1f0
	}
}
?>

<hr class="line_design">


</div>
<?php include "footer.php" ;?>
</body>
</html>