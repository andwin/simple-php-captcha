<?php

session_start();

$captcha = generateCaptchaString();
$_SESSION['captcha'] = $captcha;

$fontPath = getFontPath();

$imageWidth = 160;
$imageHeight = 50;
$angle = rand(-5, 5);

$image = imagecreatetruecolor($imageWidth, $imageHeight);
$fontColor = getFontColor($image);
$backgroundColor = imagecolorallocate($image, 255, 255, 255);
imagefilledrectangle($image, 0, 0, $imageWidth, $imageHeight, $backgroundColor);
imagettftext($image, 30, $angle, 10, 40, $fontColor, $fontPath, $captcha);

header("Content-type: image/png");
imagepng($image);

function generateCaptchaString($length = 5) {
  return strtoupper(substr(md5(rand()), 0, $length));
}

function getFontPath() {
  $files = glob('fonts/*.ttf');
  $file = array_rand($files);
  return $files[$file];
}

function getFontColor($image) {
  return imagecolorallocate($image, 0x00, 0x66, 0x99);
}
