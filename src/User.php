<?php
// include("./src/connection.php");

// include "Connection.php";

class User
{
    public $connection = null;

    function __construct($connection)
    {
        $this->connection = $connection;
        // $this->connection->getConnection();
    }

    public function create($name, $username, $email, $pass, $contact)
    {
        $insertquery = "insert into users(name,username,email,password,contact) values ('$name','$username','$email','$pass','$contact')";

        // $deltequery = "delete from users where id='57'";

        // $selectquery = "select * from users";


        $result = mysqli_query($this->connection->getConnection(), $insertquery);

        return $result;

    }
    public function login($username, $password)
    {
        $query = "select * from users where username='$username' and password='$password'";
        $result = mysqli_query($this->connection->getConnection(), $query);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            return array("success" => true, "user_id" => $row['id']);
        } else {
            return array("success" => false);
        }

    }
}
?>