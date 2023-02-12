<?php
    class Demo{
    public $name;
        function __construct($name){
        $this->name = $name;
        echo "$name"."function is saying something"."<br>";
        }
        function dosomething(){
        echo "Iamfunction->".$this->name;
        }
    }
    class child extends Demo{

    }
    $d = new child("Tony stark");
    $d->dosomething();

?>