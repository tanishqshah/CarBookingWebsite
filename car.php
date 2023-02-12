<?php
include("src/Cardetails.php");
include('components/header.php');

$id = $_GET['id'];
// echo $id;
$det = new Cars($connection);

$cardetail = $det->get($id);
// $cardetails = mysqli_fetch_assoc($cardetail);
$name = null;
$brand = null;
$price = null;
$count = 0;
$discount = null;
$images = array();
$colors = array();
$numbers = array();
$cdids = array();

while ($row = mysqli_fetch_array($cardetail)) {
    if ($count === 0) {
        $name = $row['name'];
        $brand = $row['brand'];
        $price = $row['price'];
        $discount = $row['discount'];
        $count = 1;
    }
    $images[] = $row['image'];
    $colors[] = $row['color'];
    $numbers[] = $row['number'];
    $cdids[] = $row[9];
}
// print_r($cardetails);



?>

<section class="main-container">

    <div class="main-container-child">
        <div class="container-section">
            <div class="big-car-img">
                <img id="big-img" src="<?= $images[0] ?>" alt="car">
            </div>

            <div class="img-options">
                <?php
                foreach ($images as $key => $image) {
                    ?>
                    <div class="img-option">

                        <img onClick="changeimage(this.src,'<?= $numbers[$key] ?>','<?=$colors[$key]?>','<?= $cdids[$key]?>')" src="<?= $image ?>"
                            alt="car">

                    </div>
                <?php
                }
                ?>
            </div>
            <div class="color-options">
                <?php
                foreach ($colors as $key => $color) {
                    ?>
                    <div class="color-option">
                        <p onClick="changeimage('<?=$images[$key]?>','<?= $numbers[$key] ?>','<?=$colors[$key]?>','<?= $cdids[$key]?>')" style="background-color: <?= $color ?>; cursor:pointer;"></p>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="container-section">
            <h1>
                <?= $brand ?>
                <?= $name ?>
            </h1>
            <h2>Rs
                <?= $price ?>
            </h2>
            <p>Available</p>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book.
            </p>

            <h2 id="num">
                <?= $numbers[0] ?>
            </h2>
            <a id='senddata' href="http://localhost:8888/php_basics/booking.php?cdid=<?=$cdids[0]?>">
                <button class="btn btn-primary">Book Now</button>
            </a>
        </div>
    </div>

</section>



<?php
include('components/footer.php');
?>