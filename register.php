<?php

include('src/User.php');
include("components/header.php");

$mssg = null;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = sha1($_POST['pass']);
    $contact = $_POST['contact'];
    $user = new user($connection);
    $response = $user->create($name, $username, $email, $pass, $contact);


    if ($response)
        $mssg = "success";
    else
        $mssg = "fail";
}


?>


<style>
    input {
        width: 80%;
        padding: 20pxs;
    }

    /* form {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        } */

    /* div {
            display: flex;
            justify-content: center;
            align-items: center;
            align-content: center;
        } */
    .card1 {
        height: 800px;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        /* background-color: aliceblue; */
        background-size: cover;
        background-attachment: fixed;
        background-repeat: no-repeat;
    }
</style>
<div style="background-color: aqua;">
    <div class="card1"
        style="border-radius: 15rem; background-image:url('data:image/jpeg;base64,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')">
        <form class="px-4 py-3" action="register.php" method="post"
            style="background-color:lightcyan; width: 300px; box-shadow: 100px inset;" style="border-radius: 5rem;">
            <label for="" style=" font-size:20px">Create User</label>
            <div class="mb-12 py-2">
                <!-- <label class="form-label" for="inputname">Name</label> -->
                <input type="text" name="name" class="form-control" id="inputname" placeholder="name">
            </div>

            <div class="mb-12 py-2">
                <!-- <label class="form-label" for="inputusername">UserName</label> -->
                <input type="text" name="username" class="form-control" id="inputusername" placeholder="username">
            </div>

            <div class="mb-12 py-2">
                <!-- <label class="form-label" for="inputEmail">Email</label> -->
                <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
            </div>

            <div class="mb-12 py-2">
                <!-- <label class="form-label" for="inputPassword">Password</label> -->
                <input type="password" name="pass" class="form-control" id="inputPassword" placeholder="Password">
            </div>
            <div class="mb-12 py-2">
                <!-- <label class="form-label" for="inputcontact">Contact</label> -->
                <input type="tel" name="contact" class="form-control" id="inputcontact" placeholder="Contact">
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
            <br>
            <br>
            <?php
            if ($mssg !== null) {
                ?>
                <div class="alert alert-success">
                    <?= $username . " Registered Successfully" ?>
                </div>
            <?php
            }
            ?>
        </form>


    </div>
</div>
</body>

</html>