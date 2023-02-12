<?php
include("components/header.php");
include('src/cardetails.php');
include('src/Booking.php');

if (!isset($_SESSION['car_user'])) {
    header('location:login.php');
}
$car = new Cars($connection);
$book = new Booking($connection);
$response = $car->getSingleCarDetails($_GET['cdid']);
$carDetails = mysqli_fetch_assoc($response);

// print_r($carDetails);
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $price = $carDetails['price'];
    $discount = $carDetails['discount'];
    $startdate = $_POST['start_date'];
    $enddate = $_POST['end_date'];
    // $cid = $carDetails['cid'];
    $cdid = $_GET['cdid'];
    $uid = $_SESSION['userid'];

    $endD = date_create($enddate);
    $startD = date_create($startdate);
    $days = date_diff($endD, $startD)->days == 0 ? 1 : date_diff($endD, $startD)->days;
    $amt = $days * $price;
    // print_r("The amount is " . $days);
    $discountAmount = ($discount / 100) * $amt;
    $amt -= $discountAmount;
    // print_r($cdid . " " . $uid . " " . $startdate . " " . $enddate . " " . $amt . "<br>");

    $resp = $book->create($cdid, $uid, $startdate, $enddate, $amt);
    if ($resp) {
        ?>
        <script>
            alert("Your booking has been done");
            window.location = "http://localhost:8888/php_basics/index.php";
        </script>
    <?php
    }
}
?>


<section class="main-container">

    <div class="main-container-child">
        <div class="booking-section">
            <div class="booking-section-img">
                <img src="<?= $carDetails['image']?>" alt="car">
            </div>
            <div class="booking-details">
                <h1>
                    <?= $carDetails['brand'] ?>
                    <?= $carDetails['name'] ?>
                </h1>

                <h2>Rs
                    <?= $carDetails['price'] ?>
                </h2>

                <h4>
                    <?= $carDetails['number'] ?>
                </h4>

                <p>
                    <?= $carDetails['is_available'] ? "Available" : "Unavailable" ?>
                </p>
            </div>
        </div>
        <form class="booking-section" action="http://localhost:8888/php_basics/booking.php?cdid=<?= $_GET['cdid'] ?>"
            method="post">
            <h1>Fill Booking Details</h1>

            <div class="mb-2">
                <p class="form-label">Start Date</p>
                <input class="form-control" id='start_date' min="<?= date('Y-m-d') ?>" type="date" name="start_date" />
            </div>

            <div class="mb-2">
                <p class="form-label">End Date</p>
                <input class="form-control"
                    onchange="calcprice(<?= $carDetails['price'] ?>,<?= $carDetails['discount'] ?>)" id='end_date'
                    min=<?= date('Y-m-d') ?> type="date" name="end_date" />
            </div>


            <h2>

                To Be Paid : Rs.
                <span id="final_amount">0
                </span>


            </h2>
            <h3>
                <?= $carDetails['discount'] ?>% Discount
            </h3>
            <button class="btn btn-primary">Confirm Booking</button>
        </form>
    </div>

</section>


<?php
include("components/footer.php");
?>