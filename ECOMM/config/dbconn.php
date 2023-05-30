<?php
// class db {
// private $host = "localhost";
// private $username = "root";
// private $password = "abcd1234";
// private $dbname="bilal2";
// private $db;

// public function __construct($host, $dbname, $username, $password) {
//     $this->host = $host;
//     $this->dbname = $dbname;
//     $this->username = $username;
//     $this->password = $password;
// }

// public function connect() {
//     try {
//         // $this->db = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
//         // $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         $this->db=mysql_connect($this->host,$this->username,$this->password,$this->dbname);

//     } catch (PDOException $e) {
//         die("Database connection failed: " . $e->getMessage());
//     }
// }

// }

// Database configuration
$servername = "localhost";
$username = "root";
$password = "abcd1234";
$database = "bilal2";

// Create a new mysqli object
$mysqli = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Connection successful
echo "Connected successfully";

// Perform database operations...

// Close the connection

?>
