<?php
include("components/header.php");
include("src/cardetails.php");
$car = new cars($connection);

$cars = $car->index();


?>



<section class="main-container">

    <div class="main-container-child">

        <?php
        if ($cars) {
            while ($row = mysqli_fetch_assoc($cars)) {
                ?>

                <div class="car">

                    <div class="car-img">
                        <a href="http://localhost:8888/php_basics/car.php?id=<?= $row['id'] ?>">
                            <img src="<?= $row['image'] ?>" alt="car">
                        </a>
                    </div>


                    <div class="car-details">
                        <h1>
                            <?= $row['brand'] ?>
                            <?= $row['name'] ?>
                        </h1>
                        <!-- <div class="colors">
                                                                                                                                                                                                                <p style="background-color: black;"></p>
                                                                                                                                                                                                                <p style="background-color: red;"></p>
                                                                                                                                                                                                            </div> -->

                        <h2><i class="fa-solid fa-indian-rupee-sign"></i>
                            <?= $row['price'] ?>
                        </h2>

                        <h2>
                            <?= $row['discount'] ?>% OFF
                        </h2>

                        <h2>Available</h2>
                    </div>
                </div>
            <?php
            }
        }
        ?>


    </div>

</section>

<?php
include("components/footer.php");
?>