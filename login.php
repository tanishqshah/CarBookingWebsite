<?php

include('src/User.php');
include("components/header.php");
$mssg = null;
$type = null;
$direct = "";
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = $_POST['username'];
    $pass = sha1($_POST['pass']);
    $user = new user($connection);
    $response = $user->login($username, $pass);

    if ($response["success"] === true) {
        $_SESSION["car_user"] = $username;
        $_SESSION["userid"] = $response["user_id"];
        $mssg = "Login Successfully";
        $type = "success";
        // $direct = "index.php";
        header('location:index.php');
    } else {
        $mssg = "Invalid username/Password";
        $type = "danger";
    }
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
        background-color: aliceblue;
    }

    .card1 {

        /* height: 100%; */
        /* background: url('../../assets/lmovies_bg.jpeg'); */
        background-size: cover;
        background-attachment: fixed;
        background-repeat: no-repeat;
    }
</style>
<div>
    <div class="card1" style=" background-color:gray;">
        <form class="px-4 py-3" action="<?= $direct ?>" method="POST"
            style="background-color:lightcyan; width: 300px; box-shadow: 100px inset;" style="border-radius: 5rem;">
            <label for="" style=" font-size:20px">Login User</label>


            <div class="mb-12 py-2">
                <!-- <label class="form-label" for="inputusername">UserName</label> -->
                <input type="text" name="username" class="form-control" id="inputusername" placeholder="username">
            </div>

            <div class="mb-12 py-2">
                <!-- <label class="form-label" for="inputPassword">Password</label> -->
                <input type="password" name="pass" class="form-control" id="inputPassword" placeholder="Password">
            </div>

            <button class="btn btn-primary" type="submit">Submit</button>

            <p>Dont Have account <a href="register.php">Create One</a> </p>
            <?php
            if ($mssg !== null) {
                ?>
                <div class="alert alert-<?= $type ?>">
                    <?= $mssg ?>
                </div>
            <?php
            }
            ?>
        </form>

    </div>
</div>
</body>

</html>