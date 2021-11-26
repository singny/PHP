<?php
class ParentClass{
    function callMethod($param){
        echo "<h1>Parent {$param}</h1>";
    }
}
class ChildClass extends ParentClass{
    function callMethod($param)
    {
        parent::callMethod($param);
        echo "<h1>Child {$param}</h1>"; 
    }
}
$obj = new ChildClass();
$obj->callMethod('method');

// 상속을 할 때 부모클래스가 가지고 있는 기능을 자식클래스가 덮어쓰기 하는 경우에 똑같은 이름과 똑같은 형식의 메소드를 정의하면 된다.
// 기존에 있었던 부모클래스가 갖고 있는 메소드를 호출하고 싶을 때 부모 클래스를 가리키는 표현(약속)은 "parent"이다.
?>
