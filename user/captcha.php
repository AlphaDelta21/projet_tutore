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
	$largeur = strlen($mot) * 13;
	$hauteur = 20;
	$marge = 15;
		
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
		imagecolorallocate($img, 0xBB, 0x88, 0x77));
	
	$milieuHauteur = ($hauteur / 2) - 8;
	
	imagestring($img, 6, strlen($mot) /2 , $milieuHauteur, $mot, $couleur[array_rand($couleur)]);
	//imagettftext($img, 20, 0, 10, 20, $couleur[array_rand($couleur)], $font, $mot);
	
	imagerectangle($img, 1, 1, $largeur - 1, $hauteur - 1, $noir); // La bordure
	
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
