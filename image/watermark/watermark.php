<?php
// Load the stamp and the photo to apply the watermark to
$stamp = imagecreatefrompng('text.png');    //  text.png를 stamp라는 변수에 저장
$im = imagecreatefrompng('original.png');   // original.png를 im이라는 변수에 저장

// Set the margins for the stamp and get the height/width of the stamp image
$marge_right = 10;  // 오른쪽 여백
$marge_bottom = 10; // 아래 여백
$sx = imagesx($stamp);  // 글씨의 가로길이
$sy = imagesy($stamp);  // 글씨의 세로길이

// Copy the stamp image onto our photo using the margin offsets and the photo
// width to calculate positioning of the stamp.
imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));  // im : 기본이미지 // stamp : 복사할 이미지 // imagesy($im) - $sx - $marge_right : 복사할 이미지가 들어갈 x좌표 // imagesy($im) - $sy - $marge_bottom : 복사할 이미지가 들어갈 y좌표 // 0, 0 imagesx($stamp), imagesy($stamp) : 복사할 이미지의 사용범위(시작x,시작y,끝x,끝y)

// Output and free memory
header('Content-type: image/png');  // png형식으로 이미지를 전달하겠다.
imagepng($im);  // 화면에 출력
imagedestroy($im);  //  이미지 해제
?>
