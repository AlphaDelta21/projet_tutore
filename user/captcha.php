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

/*function image($mot)
{
    $font = 10;
	
    $fontsize = imagefontwidth($font); // Largeur en pixels des caractères en fonction de la fonte choisie.
	$largeur = strlen($mot) * $fontsize;
	$hauteur = imagefontheight($font); // Hauteur en pixels des caractères en fonction de la fonte choisie.;
	$marge = $fontsize;

	
					
	$largeur_lettre = round($largeur/strlen($mot));
	
	$img = imagecreate($largeur+$marge, $hauteur+$marge);
	
	$blanc = imagecolorallocate($img, 255, 255, 255); 
	$noir = imagecolorallocate($img, 0, 0, 0);

	
	
	
	$milieuHauteur = ($hauteur+$marge)/5;
	
	// Décalage vers la droite de la moitié d'un caractère pour éviter que le premier caractère soit à cheval sur le cadre 
	$index=$fontsize/1.8;
	
	
	
	// Insertion lettre par lettre du mot. Ainsi chaque lettre peut avoir une couleur aléatoire.
	for($i=0;$i<strlen($mot);$i++)
	{		
		$color = imagecolorallocate ( $img , rand(0,255) , rand(0,255) , rand(0,255) );
		
		
		$nbAlea = rand ( 3 , 10 );
		$milieuHauteur = ($hauteur+$marge)/$nbAlea;// Centrage en hauteur du texte
		
		imagestring($img, 6, $index , $milieuHauteur, $mot[$i], $color);
    	$index+=$fontsize; // On se déplace sur x de la taille d'un caractère		
    }
	
	$color = imagecolorallocate ( $img , rand(0,255) , rand(0,255) , rand(0,255) );
	imagerectangle($img, 1, 1, $largeur+$marge-1, $hauteur+$marge-1, $color); // La bordure
	
	imagepng($img);
	
	imagedestroy($img);
}*/

function image($mot)
{
	$size = 32;
	$marge = 30;
	
	$font = 'font/angelina.TTF';

	$largeur = 100;
	$hauteur = 20;
	
	$largeur_lettre = round($largeur/strlen($mot));
	
	
	$img = imagecreate($largeur+$marge, $hauteur+$marge);	
	
	$fond = imagecolorallocate ( $img , rand(0,70) , rand(0,70) , rand(0,70));
	
	
	$color = imagecolorallocate ( $img , rand(80,255) , rand(80,255) , rand(80,255));
	
	for($i=0; $i<strlen($mot); $i++)
	{
		$color = imagecolorallocate ( $img , rand(80,255) , rand(80,255) , rand(80,255));
		
		$l = $mot[$i];
		$angle = mt_rand(-30,30);
		imagettftext($img,mt_rand($size-7,$size),$angle,($i*$largeur_lettre+12), $hauteur+mt_rand(0,$marge/2),$color, $font, $l);
		
	}
	
	$color = imagecolorallocate ( $img , rand(10,255) , rand(80,255) , rand(80,255));
	imageline($img, 2,mt_rand(2,$hauteur+$marge), $largeur+$marge, mt_rand(2,$hauteur), $color); // 1ère ligne qui passe par dessus le texte
	
	$color = imagecolorallocate ( $img , rand(10,255) , rand(80,255) , rand(80,255));
	imageline($img, 2,mt_rand(2,$hauteur+$marge), $largeur+$marge, mt_rand(2,$hauteur), $color); // 2nd ligne 
	
	$color = imagecolorallocate ( $img , rand(80,255) , rand(80,255) , rand(80,255));
	imageline($img, 2,mt_rand(2,$hauteur+$marge), $largeur+$marge, mt_rand(2,$hauteur), $color); // 3ème ligne 
	
	$color = imagecolorallocate ( $img , rand(0,255) , rand(0,255) , rand(0,255));
	imagerectangle($img, 1, 1, $largeur+$marge-1, $hauteur+$marge-1, $color); // La bordure
	
	$fond = imagecolorallocate ( $img , rand(200,255) , rand(200,255) , rand(200,255));
	
	imagepng($img);
	imagedestroy($img);	
}


function captcha()
{
	$mot = nombre(5);
	$_SESSION['captcha'] = $mot;
	image($mot);
}

	

header("Content-type: image/png");
captcha();

?>
