<?php
class demo{
public static string $name = "Car rental";
public function channge(){
        self::$name = "car details 2";

}
public function printdetail(){
        echo self::$name;
}


}
echo demo::$name."<br>";


$d =new demo();
$d->channge();

$d2 = new demo();
$d2->printdetail();
?>