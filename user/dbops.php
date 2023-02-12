<?php

$conn = mysqli_connect("localhost", "root", "root", "car-rental");


$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$pass = sha1($_POST['pass']);
$contact = $_POST['contact'];

// if (!$conn)
//     echo "connection not established";
// else
//     echo "connection successfull";

$insertquery = "insert into users(name,username,email,password,contact) values 
('$name','$username','$email','$pass','$contact')";

// $deltequery = "delete from users where id='57'";

// $selectquery = "select * from users";

mysqli_query($conn, $insertquery);

// $data = mysqli_fetch_array($response);
// echo mysqli_num_rows($response);

// echo "<br>";

// echo mysqli_error($conn);

// while($data = mysqli_fetch_array($response)){
//     print_r($data[3]);
//     echo "<br>";
// }

// echo sizeof($data);
// echo "<br>";

// print_r($data);

?>