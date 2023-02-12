<?php

// $num = '14';
// $num2 = 12;
// var_dump($num1==$num2); to get the datatype with value 
// == determine value 
// === detenmine datatype with value 


// if ($num == 14)
//     echo "correct";
// else
//     echo "Incorrect";

// $num = array(12, 32, 43, 15,34);
// echo $num[2]."<br>";

// $n1 = sizeof($num);
// for ($i = 0; $i < $n1; $i++) {
//     for ($j = 0; $j < $n1 - $i - 1; $j++) {
//         if ($num[$j] > $num[$j + 1]) {
//             $t1 = $num[$j];
//             $num[$j] = $num[$j + 1];
//             $num[$j + 1] = $t1;
//         }
//     }
// }

// for($i1=0;$i1<$n1;$i1++)
//     echo $num[$i1]."<br>"; 

// foreach ($num as $a)
//     echo $a;

// $num = 0;
//     function dosomething(){
//     echo "hello";
//     }
//     function do_something($num){
//     echo "$num";
//     }

// do_something(10);
// dosomething();
function single($num){
    for($i=1;$i<=$num/2;$i++){
        // $x=$num/$i;
        if($i*$i===$num)
            return $i;
    }
}

function fact($num){
    $fact = 1;
    for($i=1;$i<=$num;$i++){
        $fact = $fact * $i;
    }
    return $fact;
}

echo single(36)."<br><br>";
echo fact(7);

?>