<?php

include('./User.php');

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = sha1($_POST['pass']);
    $contact = $_POST['contact'];
    $user = new user();
    $response = $user->create($name, $username, $email, $pass, $contact);

    if ($response)
        echo "success";
    else
        echo "fail";
}

?>