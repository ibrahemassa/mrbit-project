<?php 
$sname = "localhost";
$uname = "root";
$psswd = "";
$dbname = "nstoreDb";

$connection = new mysqli($sname, $uname, $psswd, $dbname);

if($connection -> connect_error){
  die("Error" . $connection -> connect_error);
} else {
  // echo "Good<br>";
}

// function createTable($connection, $name) {
//   if($connection -> query($name) === True){
//     echo "table created!";
//   } else{
//     echo "error";
//   }
// }

function createRecord($connection, $table, $cols, $values){
  $newRecord = "INSERT INTO $table($cols) VALUES($values)";
  if ($connection -> query($newRecord) === True){
    // echo "New record created!";
    // header("Location:". $table . ".php");
    echo "<script>alert('good!')</script>";
  } else {
    echo "Error: " . $connection->error . "<br>";
    echo "SQL Query: " . $newRecord;
  }
}


// $db = "CREATE DATABASE nstoreDb";
// if($connection -> query($db) === True){
//   echo "db created!";
// } else{
//   echo "error";
// }

// $products = "CREATE TABLE products(
//   id INT(11) AUTO_INCREMENT PRIMARY KEY,
//   name VARCHAR(255) NOT NULL,
//   description VARCHAR(255) NOT NULL,
//   brand VARCHAR(255) NOT NULL,
//   categories VARCHAR(255) NOT NULL,
//   tax VARCHAR(255) NOT NULL,
//   tags VARCHAR(255) NOT NULL,
//   price VARCHAR(255) NOT NULL,
//   specialPrice VARCHAR(255) NOT NULL,
//   sku VARCHAR(255) NOT NULL,
//   stock VARCHAR(255) NOT NULL,
//   media VARCHAR(255) NOT NULL,
//   attributes VARCHAR(255) NOT NULL,
//   metaTitle VARCHAR(255) NOT NULL,
//   metaDescription VARCHAR(255) NOT NULL,
//   status VARCHAR(255) NOT NULL,
//   virtual VARCHAR(255) NOT NULL
// )";
// if($connection -> query($products) === True){
//   echo "table created!";
// } else{
//   echo "error";
// }

// $categories = "CREATE TABLE categories(
//   id INT(11) AUTO_INCREMENT PRIMARY KEY,
//   name VARCHAR(255) NOT NULL,
//   subCategory VARCHAR(255) NOT NULL,
//   image VARCHAR(255) NOT NULL,
//   status VARCHAR(255) NOT NULL
// )";
// if($connection -> query($categories) === True){
//   echo "table created!";
// } else{
//   echo "error";
// }

// $brands = "CREATE TABLE brands(
//     id INT(11) AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(255) NOT NULL,
//     image VARCHAR(255) NOT NULL,
//     status VARCHAR(255) NOT NULL
// )";
//
// if($connection -> query($brands) === True){
//   echo "table created!";
// } else{
//   echo "error";
// }
//
// $tags = "CREATE TABLE tags(
//     id INT(11) AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(255) NOT NULL
// )";
// createTable($connection, $tags);

// $orders = "CREATE TABLE orders(
//     id INT(11) AUTO_INCREMENT PRIMARY KEY,
//     customerName VARCHAR(255) NOT NULL,
//     customerEmail VARCHAR(255) NOT NULL,
//     status VARCHAR(255) NOT NULL,
//     total VARCHAR(255) NOT NULL,
//     productsId VARCHAR(255) NOT NULL,
//     usersId VARCHAR(255) NOT NULL
// )";
// createTable($connection, $orders);

// $coupon = "CREATE TABLE coupon(
//     id INT(11) AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(255) NOT NULL,
//     code VARCHAR(255) NOT NULL,
//     discountType VARCHAR(255) NOT NULL,
//     value VARCHAR(255) NOT NULL,
//     startDate VARCHAR(255) NOT NULL,
//     endDate VARCHAR(255) NOT NULL,
//     status VARCHAR(255) NOT NULL,
//     productsId VARCHAR(255) NOT NULL
// )";
// createTable($connection, $coupon);

// $users = "CREATE TABLE users(
//     id INT(11) AUTO_INCREMENT PRIMARY KEY,
//     username VARCHAR(255) NOT NULL,
//     fname VARCHAR(255) NOT NULL,
//     lname VARCHAR(255) NOT NULL,
//     email VARCHAR(255) NOT NULL,
//     phone VARCHAR(255) NOT NULL,
//     roles VARCHAR(255) NOT NULL,
//     password VARCHAR(255) NOT NULL,
//     address VARCHAR(255) NOT NULL,
//     regDate VARCHAR(255) NOT NULL
// )";
// createTable($connection, $users);

// $roles = "CREATE TABLE roles(
//     id INT(11) AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(255) NOT NULL,
//     permissions VARCHAR(255) NOT NULL,
//     usersId VARCHAR(255) NOT NULL
// )";
// createTable($connection, $roles);
?>
