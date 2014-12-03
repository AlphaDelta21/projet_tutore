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
    $font = 10;
    $fontsize = imagefontwidth($font); // Largeur en pixels des caractères en fonction de la fonte choisie.
	$largeur = strlen($mot) * $fontsize;
	$hauteur = imagefontheight($font); // Hauteur en pixels des caractères en fonction de la fonte choisie.;
	$marge = $fontsize;
	$angle = 180;
	
	
		
	$largeur_lettre = round($largeur/strlen($mot));
	
	$img = imagecreate($largeur+$marge, $hauteur+$marge);
	
	$blanc = imagecolorallocate($img, 255, 255, 255); 
	$noir = imagecolorallocate($img, 0, 0, 0);
	
	$couleur = array(
		imagecolorallocate($img, 0x99, 0x00, 0x66),
		imagecolorallocate($img, 0xCC, 0x00, 0x00),
		imagecolorallocate($img, 0x00, 0x00, 0xCC),
		imagecolorallocate($img, 0x00, 0xCC, 0x00),
		imagecolorallocate($img, 0x66, 0x99, 0xCC),
		imagecolorallocate($img, 0x00, 0x66, 0x99),
		imagecolorallocate($img, 0x05, 0x05, 0x05),
		imagecolorallocate($img, 0xBB, 0x88, 0x77),
		imagecolorallocate($img, 183, 183, 183),
		imagecolorallocate($img, 1, 248, 56),
		imagecolorallocate($img, 240, 247, 2),
		imagecolorallocate($img, 7, 14, 241),
		imagecolorallocate($img, 0, 236, 249));
	
	
	$milieuHauteur = ($hauteur+$marge)/5;
	
	// Décalage vers la droite de la moitié d'un caractère pour éviter que le premier caractère soit à cheval sur le cadre 
	$index=$fontsize/1.8;
	
	
	
	// Insertion lettre par lettre du mot. Ainsi chaque lettre peut avoir une couleur aléatoire.
	for($i=0;$i<strlen($mot);$i++)
	{
		
		$nbAlea = rand ( 3 , 10 );
		$milieuHauteur = ($hauteur+$marge)/$nbAlea;// Centrage en hauteur du texte
		
		imagestring($img, 6, $index , $milieuHauteur, $mot[$i], $couleur[array_rand($couleur)]);
    	$index+=$fontsize; // On se déplace sur x de la taille d'un caractère
		
		//imagerotate ( $img , $angle , 0 );
    }
	
	imagerectangle($img, 1, 1, $largeur+$marge-1, $hauteur+$marge-1, $couleur[array_rand($couleur)]); // La bordure
	
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
