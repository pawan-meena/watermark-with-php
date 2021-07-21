
<?php
if(isset($_POST['image']))
{$data = $_POST['image'];
	$image_array_1 = explode(";", $data);
	$image_array_2 = explode(",", $image_array_1[1]);
$data = base64_decode($image_array_2[1]);
$image_name = 'images/profiles/' . time() . '.png';
file_put_contents($image_name, $data);
$img = imagecreatefrompng($image_name);
$white = imagecolorallocate($img, 0, 0, 0);
$font = "./fonts/open-sans.light.ttf";
imagettftext($img, 25, 0, 130, 30, $white, $font, "mansaInfotech");
imagejpeg($img, 'watermark/'.$image_name , 100);
echo 'watermark/'.$image_name;
}
?>