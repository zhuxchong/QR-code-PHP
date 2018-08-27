<?php
/**
 * Created by PhpStorm.
 * User: Chong
 * Date: 2018/8/27
 * Time: 11:08
 */


include './phpqrcode.php';
QRcode::png('zhuxchong','qrcode.png',2,10,true);
$logo = 'chong.PNG';
$QR = 'qrcode.png';
if ($logo !== FALSE) {
    $QR = imagecreatefromstring(file_get_contents($QR));
    $logo = imagecreatefromstring(file_get_contents($logo));
    $QR_width = imagesx($QR);
    $QR_height = imagesy($QR);
    $logo_width = imagesx($logo);
    $logo_height = imagesy($logo);
    $logo_qr_width = $QR_width / 5;
    $scale = $logo_width/$logo_qr_width;
    $logo_qr_height = $logo_height/$scale;
    $from_width = ($QR_width - $logo_qr_width) / 2;
    //resize
    imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width,
        $logo_qr_height, $logo_width, $logo_height);
}
//New image
imagepng($QR, 'newcode.png');?>
<html>
<body>
<div class="QRcode">
    <figure>
        <img src="newcode.png" alt="QR test">
    </figure>
</div>

</body>
</html>
