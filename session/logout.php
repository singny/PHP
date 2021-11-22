<?php
ini_set("display_errors","1");
session_destroy();  // 세션 데이터 초기화
header('Location: ./login.html');   // login페이지로 리다이렉션
?>
