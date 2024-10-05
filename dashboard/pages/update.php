<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "action.php";

$id = $_POST['id'];
$table = $_POST['table'];

// print_r($_POST);
// echo "<br>";
// print_r($_FILES);
// echo "<br>";
$places = "";
$hasImage = false;

function add_param($name, &$query, &$places, &$params, $path=''){
    $query = $query . "{$name}=?, ";
    $places = $places . "s";
    if($name != 'image')
      $params[] = $_POST[$name];
    else 
      $params[] = $path;
}

function updateQuery($connection, $table, $query, $places, $params){
    $prep = $connection -> prepare($query);
    $prep -> bind_param($places, ...$params);
    if($prep -> execute()){
      header("Location:{$table}.php");
    } else {
      echo "Error";
    }
}
if(isset($_POST['submit'])){
  $query = "UPDATE {$table} SET ";
  $elems = array_slice($_POST, 2);
  $params = [];
  foreach ($elems as $k => $v) {
    if($k != 'submit'){
      add_param($k, $query, $places, $params);
    }
  }
  if(array_key_exists('image', $_FILES)){
    if($_FILES['image']['name'] != null){
      $targetFile = "uploads/".basename($_FILES["image"]["name"]);
      $imgType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
      $check = getimagesize($_FILES["image"]["tmp_name"]);
      $hasImage = true;
      add_param('image', $query, $places, $params, $targetFile);
    }
  }
  // print_r($params);
  $query = substr($query, 0, -2); 
  $query = $query . " WHERE id=?";
  $places = $places . "i"; 
  // echo $query;
  $params[] = $id;
  if($hasImage && $check !== false)
    move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
  updateQuery($connection, $table, $query, $places, $params);
} else{
  echo "Error 404";
}

?>

