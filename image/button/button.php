<?php
header("Content-type: image/png");  // 서버가 클라이언트에게 파일이 PNG라는 것을 알려준다.
$string = $_GET['text'];    // 사용자가 입력한 것을 string이라는 변수에 담는다.
$im = imagecreatefrompng("button.png"); // 이미지를 읽고 im이라는 변수에 담는다. 
$orange = imagecolorallocate($im, 60, 87, 156); 
$px = (imagesx($im) - 7.5 * strlen($string)) / 2;   // imagesx : 이미지의 길이 // 7.5 : (대략) 한글자의 폭 // strlen : 문자의 길이를 나타내는 함수
imagestring($im, 4, $px, 9, $string, $orange);  // px : x축의 값 // 9 : y축의 값 // string이라는 변수를 orange라는 변수의 색으로 표현 // 4pont 이용
imagepng($im);  // 이미지 전송
imagedestroy($im);  //  이미지 끄기
?>
