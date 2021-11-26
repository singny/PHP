<?php
class Animal{
    function run(){
        print('running...<br>');
    }
    function breathe(){
        print('breathing...<br>');
    }
}
class Human extends Animal{     // 클래스 Human은 Animal의 메소드를 상속받는다.
    function think(){
        print('thinking...<br>');
    }
    function talk(){
        print('talking...<br>');
    }
}
$human= new Human();
$human->run();
$human->think();
?>
