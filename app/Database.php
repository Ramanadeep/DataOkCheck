<?php 
namespace Test\app;
use Mysqli;

Class Database
{
    public $connectionString;
    function __construct($host, $username, $password){
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->connectionString = NULL;
    }

    public function connectDB()
    {
        if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
            echo 'We don\'t have mysqli!!!';
        } else {
            echo 'Phew we have it!';
        }

        // Create connection
        $this->connectionString= new mysqli($this->host , $this->username, $this->password);
        // Check connection
        if ($this->connectionString->connect_error) {
        die("Connection failed: " . $this->connectionString->connect_error);
        }
        return $this->connectionString;
    }

    function createDB(){ 
        $sql = "CREATE DATABASE catalystdb";
        if ($this->connectionString->query($sql) === TRUE) {
        echo "Database created successfully";
        } else {
        echo "Error creating database: " . $this->connectionString->error;
        }
    }
}
?>
