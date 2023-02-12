<?php
include "components/header.php";
include "src/Booking.php";

$bookdetail = new Booking($connection);
// print_r($_SESSION['userid']);
$response = $bookdetail->get($_SESSION['userid']);
// print_r($data);
$color = "";
?>

<table class="container table mt-3">
    <tr class="py-2">
        <th>Name</th>
        <th>Brand</th>
        <th>start_date</th>
        <th>End_date</th>
        <th>Amount</th>
        <th>Number</th>
        <th>Status</th>
    </tr>
    <?php
    while ($data = mysqli_fetch_assoc($response)) {
        $currentdate = date('Y-m-d');
        $startdate = strtotime($data['start_date']);
        $startdate = date('Y-m-d', $startdate);
        // echo $startdate;
        $enddate = strtotime($data['end_date']);
        $enddate = date('Y-m-d', $enddate);
        // $enddate = $data['end_date'];
        // echo $date;
        $mssg = "";
        if ($currentdate >= $startdate && $currentdate <= $enddate) {
            $mssg = "onGoing";
            $color = "success";
        } else if ($currentdate > $enddate) {
            $mssg = "Finished";
            $color = "danger";
        } else if ($currentdate < $startdate) {
            $color = "primary";
            $mssg = "upComing";
        }

        ?>
        <tr class="text-<?= $color ?>">
            <td>
                <?= $data['name'] ?>
            </td>
            <td>
                <?= $data['brand'] ?>
            </td>
            <td>
                <?= $data['start_date'] ?>
            </td>
            <td>
                <?= $data['end_date'] ?>
            </td>
            <td>
                <?= $data['amount'] ?>
            </td>
            <td>
                <?= $data['number'] ?>
            </td>
            <td>
                <?= $mssg ?>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
<?php
include "components/footer.php";
?>