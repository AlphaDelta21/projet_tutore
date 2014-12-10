<?php
/**
 * Fonction qui retournera un captcha
 * @author Alexis Viverge
 */

session_start();

function nombre($n)
{
	return str_pad(mt_rand(0,pow(10,$n)-1),$n,'0',STR_PAD_LEFT);
}

function image($mot)
{
	$size = 36; // taille de la police
	$marge = 30; 
	
	$font = 'font/angelina.TTF'; // la police 

	$largeur = 100; // largeur du rectangle
	$hauteur = 20; // hauteur du rectangle	
	$largeur_lettre = round($largeur/strlen($mot)); // espacement entre chaques caractères
	
	
	$img = imagecreate($largeur+$marge, $hauteur+$marge); // création du rectangle, on lui attribut ses dimensions	
	
	imagecolorallocate ( $img , rand(0,70) , rand(0,70) , rand(0,70)); // ici on attribut la couleur de fond de notre image( en effet le fond prend sa couleur au 1er appel de la fonction ), un ton foncé pour une meilleure lisibilité

	
	for($i=0; $i<strlen($mot); $i++) // on parcourt une boucle allant de 0 à "le nombre de caractère"
	{
		$color = imagecolorallocate ( $img , rand(80,255) , rand(80,255) , rand(80,255)); // on créait une couleur aléatoire avec un ton à tendance clair. Elle est mise ici pour générer un couleur aléatoire chaque fois que l'on entre dans la boucle, ce qui permet de créer un couleur diférente pour chaques caractères.
		
		$angle = mt_rand(-30,30); // angle aléatoire comprit entre -30 et 30 degrés dans ce cas là.
				
		/* Fonction assez complexe, elle permet de manipuler les caractères librement :
		 * -mt_rand($size-7,$size) : va permettre une réduction aléatoire du caractère, entre size-7 et size
		 * -$angle : on l'a défini plus haut, on attribut un angle aléatoire pour incliner le caractère
		 * -$hauteur+mt_rand(0,$marge/2) : permet de déplacer le caractère verticalement et aléatoirement
		 * -les 3 suivants sont succincts
	     */
		 imagettftext($img,mt_rand($size-7,$size),$angle,($i*$largeur_lettre+12), $hauteur+mt_rand(0,$marge/2),$color, $font, $mot[$i]);		
	}
	
	$color = imagecolorallocate ( $img , rand(150,255) , rand(150,255) , rand(150,255)); // on créait une couleur claire pour faire une bonne différence entre le fond foncé et les traits
	imageline($img, 2,mt_rand(2,$hauteur+$marge), $largeur+$marge, mt_rand(2,$hauteur+$marge), $color); // 1ère ligne qui passe par dessus le texte
	
	$color = imagecolorallocate ( $img , rand(150,255) , rand(150,255) , rand(150,255)); // une autre couleur pour éviter que la 1ère et 2ème ligne soient de la même couleur
	imageline($img, 2,mt_rand(2,$hauteur+$marge), $largeur+$marge, mt_rand(2,$hauteur+$marge), $color); // 2ème ligne 
	
	$color = imagecolorallocate ( $img , rand(150,255) , rand(150,255) , rand(150,255)); // idem 
	imageline($img, 2,mt_rand(2,$hauteur+$marge), $largeur+$marge, mt_rand(2,$hauteur+$marge), $color); // 3ème ligne 
	
	$color = imagecolorallocate ( $img , rand(0,255) , rand(0,255) , rand(0,255));
	imagerectangle($img, 0, 0, $largeur+$marge-1, $hauteur+$marge-1, $color); // La bordure
	imagerectangle($img, 1, 1, $largeur+$marge-2, $hauteur+$marge-2, $color); // Une autre pour donner l'impression d'une seule plus grosse
	
	imagepng($img);
	imagedestroy($img);	
}


function captcha()
{
	$mot = nombre(5); // nombre de caractère souhaité
	$_SESSION['captcha'] = $mot; // on utilise les sessions pour pouvoir récupérer le code générer dans d'autre pages php
	image($mot);
}

	

header("Content-type: image/png");
captcha();

?>
