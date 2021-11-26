<?php
class Person{
    private $name;  //  외부로부터 특정한 변수를 은닉한다.
    function sayHi(){
        print("Hi, I'm {$this->name}.");
    }
    function setName($_name){   // 값을 세팅하는 메소드
        $this->ifEmptyDie($_name);
        $this->name = $_name;
    }
    function getName(){     // 값을 가져오는 메소드
        return $this->name;
    }
    private function ifEmptyDie($value){
        if(empty($value)){
            die('I need name');
        }
    }
}
$egoing = new Person();
// $egoing->name = 'egoing';
$egoing->setName('egoing');
$egoing->sayHi();
// $egoing->ifEmptyDie('123456');
// print($egoing->name);
print($egoing->getName());

// 데이터를 보호해야 하는 상황에 사용
?>
