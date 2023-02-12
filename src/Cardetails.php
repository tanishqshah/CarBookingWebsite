<?php
// include "Connection.php";

class Cars
{
    private $connection = null;
    function __construct($connection)
    {
        $this->connection = $connection;
        // $this->connection->getConnection();
    }

    public function index()
    {
        $query = "select * from cars";

        if ($result = mysqli_query($this->connection->getConnection(), $query)) {
            return $result;
        }
    }
    public function get($id)
    {
        $query = "select * from cars c,car_details cd where c.id=cd.cid and c.id=$id";
        if ($result = mysqli_query($this->connection->getConnection(), $query)) {
            return $result;
        }
    }

    public function getSingleCarDetails($id)
    {
        $query = "select * from cars c,car_details cd where cd.cid=c.id and cd.id=$id";
        if ($result = mysqli_query($this->connection->getConnection(), $query)) {
            return $result;
        }
    }

}
?>