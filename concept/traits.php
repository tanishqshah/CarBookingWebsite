<?php
    trait details{
        function getuserdetail(){
        echo "user is here"."<br>";
        }
        function getadmindetail(){
        echo "admin is here"."<br>";
        }
    }
    class panel{
    use details;
    }

$c = new panel();
$c->getadmindetail();
$c->getuserdetail();



?>