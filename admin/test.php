<?php
$filename="hsc-marksheet.jpg";
//$imgpath is where your images in this gallery reside
$imgpath="img/";
//Put them all together to get the full path to the image:
$imgpath = $imgpath.$filename;
//Load the stamp and the photo to apply the watermark to
$im = imagecreatefromjpeg($imgpath);

// First we create our stamp image manually from GD
$stamp = imagecreatetruecolor(100, 70);
imagefilledrectangle($stamp, 0, 0, 99, 69, 0x0000FF);
imagefilledrectangle($stamp, 9, 9, 90, 60, 0xFFFFFF);
imagestring($stamp, 5, 20, 20, 'E-vault Team', 0x0000FF);
imagestring($stamp, 3, 20, 40, '(c)2017-18', 0x0000FF);

// Set the margins for the stamp and get the height/width of the stamp image
$marge_right = 10;
$marge_bottom = 10;
$sx = imagesx($stamp);
$sy = imagesy($stamp);

// Merge the stamp onto our photo with an opacity of 50%
imagecopymerge($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 50);

// Save the image to file and free memory
imagepng($im, $imgpath);
imagedestroy($im);

// //Let's say you sent the filename via the url, i.e. watermark.php?filename=myimage.jpg
// $filename="hsc-marksheet.jpg";
// //$imgpath is where your images in this gallery reside
// $imgpath="../user/images/";
// //Put them all together to get the full path to the image:
// $imgpath = $imgpath.$filename;
// //OK cool, let's start the process of outputting the image with a watermark...
// header('content-type: image/jpeg'); //HTTP header - assumes your images in the gallery are JPGs
// //$watermarkfile is the filepath for your watermark image as a PNG-24 Transparent (ex: your logo)
// $watermarkfile="watermark.png";
// //Get the attributes of the watermark file so you can manipulate it
// $watermark = imagecreatefrompng($watermarkfile);
// //Get the width and height of your watermark - we will use this to calculate where to put it on the image
// list($watermark_width,$watermark_height) = getimagesize($watermarkfile);
// //Now get the main gallery image (at $imgpath) so we can maniuplate it
// $image = imagecreatefromjpeg($imgpath);
// //Get the width and height of your image - we will use this to calculate where the watermark goes
// $size = getimagesize($imgpath);
// //Calculate where the watermark is positioned
// //In this example, it is positioned in the lower right corner, 15px away from the bottom & right edges
// $dest_x = $size[0] - $watermark_width - 15;
// $dest_y = $size[1] - $watermark_height - 15;
// //I used to use imagecopymerge to apply the watermark to the image
// //However it does not preserve the transparency and quality of the watermark
// //imagecopymerge($image, $watermark, $dest_x, $dest_y, 0, 0, $watermark_width, $watermark_height, 70);
// //So I now use this function which works beautifully:
// //Refer here for documentation: http://www.php.net/manual/en/function.imagecopy.php
// imagecopy($image, $watermark, $dest_x, $dest_y, 0, 0, $watermark_width, $watermark_height);
// //Finalize the image:
// imagejpeg($image);
// //Destroy the image and the watermark handles
// imagedestroy($image);
// imagedestroy($watermark);
?>
