<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="phptasks.php" method="POST">
Name: <input type="text" required name="name"><br>
E-mail: <input type="text" required name="email"><br>
Database: <input type="text" required name="databasename"><br>
<input type="submit">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $databasename = $_POST['databasename'];
    $servername = "localhost";
    $username = "root";
    $password = "abcd1234";
    $connection = new mysqli($servername, $username, $password);
    //creating database
    $sql1="CREATE DATABASE $databasename ";
    $result=mysqli_query($connection,$sql1);
    if ($result) {
        echo "database created<br>";
        $connection = new mysqli($servername, $username, $password,$databasename);
         //User
         $sql="CREATE TABLE Users (
            user_id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL,
            address VARCHAR(255) NOT NULL,
            phone_number VARCHAR(20) NOT NULL
        )";
        //product
        $sql5="CREATE TABLE Products (
            product_id INT AUTO_INCREMENT PRIMARY KEY,
            product_name VARCHAR(255) NOT NULL,
            description TEXT,
            price DECIMAL(10, 2) NOT NULL,
            stock_quantity INT NOT NULL
        )";
        
        // -- Categories Table
        $sql2="CREATE TABLE Categories (
            category_id INT AUTO_INCREMENT PRIMARY KEY,
            category_name VARCHAR(255) NOT NULL
        )";
        
        // -- Orders Table
        $sql3="CREATE TABLE Orders (
            order_id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT,
            order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            total_amount DECIMAL(10, 2) NOT NULL,
            FOREIGN KEY (user_id) REFERENCES Users(user_id)
        )";
        
        // -- Order_Items Table
        $sql4="CREATE TABLE Order_Items (
            order_item_id INT AUTO_INCREMENT PRIMARY KEY,
            order_id INT,
            product_id INT,
            quantity INT NOT NULL,
            item_price DECIMAL(10, 2) NOT NULL,
            FOREIGN KEY (order_id) REFERENCES Orders(order_id),
            FOREIGN KEY (product_id) REFERENCES Products(product_id)
        )";
        
     
        
        $result=mysqli_query($connection,$sql);
        $result1=mysqli_query($connection,$sql5);
        $result2=mysqli_query($connection,$sql2);
        $result3=mysqli_query($connection,$sql3);
        $result4=mysqli_query($connection,$sql4);
        if($result&&$result1&&$result2&&$result3&&$result4){
            echo "the db table was created  successfully<br>
            ";
        
        }
        else{
            echo "unable to create database created".mysqli_error($connection)."<br>";
        }
    } else {
        echo "unable to create database".mysqli_error($connection)."<br>";
    }
    

 echo "data enter<br>";
 if (!$connection) {
     die("Error" . mysqli_connect_error())."<br>";
 } else {
     echo "connection establish<br>";
 }
 
}
?>
</body>
</html>
