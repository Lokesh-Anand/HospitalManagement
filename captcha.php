<?PHP
  
  // initialise image with dimensions of 160 x 45 pixels
  $image = @imagecreatetruecolor(160, 45) or die("Cannot Initialize new GD image stream");

  // set background and allocate drawing colours
  $background = imagecolorallocate($image, 192,192,192);
  imagefill($image, 0, 0, $background);
  $linecolor = imagecolorallocate($image, 0x33, 0x99, 0xCC);
  $textcolor1 = imagecolorallocate($image, 0x00, 0x00, 0x00);
  $textcolor2 = imagecolorallocate($image, 0xFF, 0xFF, 0xFF);

  // draw random lines on canvas
  for($i=0; $i < 8; $i++) {
    imagesetthickness($image, rand(1,3));
    imageline($image, rand(0,160), 0, rand(0,160), 45, $linecolor);
  }

  session_start();

  // using a mixture of TTF fonts
  $fonts = array();
  $fonts[] = "C:/Windows/Fonts/PALSCRI.TTF";
  $fonts[] = "C:/Windows/Fonts/ONYX.TTF";
  $fonts[] = "C:/Windows/Fonts/SCRIPTBL.TTF";

  // add random digits to canvas using random black/white colour
  $digit = '';
  for($x = 10; $x <= 130; $x += 30) {
    $textcolor = (rand() % 2) ? $textcolor1 : $textcolor2;
    $digit .= ($num = rand(0, 9));
    imagettftext($image, 20, rand(-30,30), $x, rand(20, 42), $textcolor, $fonts[array_rand($fonts)], $num);
  }

  // record digits in session variable
  $_SESSION['digit'] = $digit;

  // display image and clean up
  header('Content-type: image/png');
  imagepng($image);
  imagedestroy($image);
?>