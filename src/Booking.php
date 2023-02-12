<?php
class Booking
{
    private $connection = null;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    public function get($uid)
    {
        $query = "select c.name, c.brand, cd.image, b.start_date, b.end_date, b.amount, cd.number from booking b, users u, car_details cd, cars c where cd.id=b.cdid and b.uid=u.id and cd.cid=c.id and b.uid=$uid";
        $conn = $this->connection->getConnection();
        $res = mysqli_query($conn, $query);
        return $res;
    }
    public function create($cdid, $uid, $startDate, $endDate, $amount)
    {
        $query = "insert into booking(cdid,uid,start_date,end_date,amount) values($cdid,$uid,'$startDate','$endDate',$amount)";
        $conn = $this->connection->getConnection();
        $res = mysqli_query($conn, $query);
        return $res;
    }
}