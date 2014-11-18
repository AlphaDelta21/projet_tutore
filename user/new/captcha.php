<?php
session_start(); // on utilise les sessions pour mettre de côté le code aléatoire créé
header ("Content-type: image/png"); // on va faire une image jpg

$code='MN7WGABDEF47GHJKLMNPRSTUVWXYZ123456789'; // les lettres de base
$code=str_shuffle(substr(str_shuffle($code),0,5)); // qu'on mélange!

$taille=30;
$angle=rand(10,20);
$font='fonts/hrt.ttf';
$posx=15;

$place=imagettfbbox($taille,$angle,$font,$code); // on calcule la place prise par le texte
$largeur=$place[2]-$place[0]+$posx;
$posy=$place[1]-$place[5];
$hauteur=$posy+15;

$im = imagecreatetruecolor ($largeur,$hauteur); // et on créé une image assez grande
$background_color = imagecolorallocate ($im, 250,250 ,00);
$ecriture_color = imagecolorallocate ($im, 0, 0, 0);

imagefill($im,1,1,$background_color);
imagettftext($im,$taille,$angle,$posx,$posy,$ecriture_color,$font,$code); // ensuite on écrit dedans
//imageantialias($im,1); // n'est pas supporté partout. Si ça fonctionne chez vous, c'est plus joli

$_SESSION['captcha']=$code; // et on sauve le code en session qui pourra être testé plus tard

imagepng($im);// création de l'image
?>