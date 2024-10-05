<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Argon Dashboard 2 by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  <link href="../assets/css/custom.css" rel="stylesheet"/>
</head>
<div class="container">
      <div class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-body px-0 pt-0 pb-2">
<?php 
include "action.php";
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $table = $_GET['table'];
  $query = "SELECT * FROM {$table} WHERE id=?";
  $prep = $connection -> prepare($query);
  $prep -> bind_param("i", $id);
  $prep -> execute();
  $result = $prep -> get_result();
  if($result -> num_rows > 0){
    $row = $result -> fetch_assoc();
    echo '<form action="update.php" method="post" enctype="multipart/form-data">';
    echo '<input type="hidden" name="id" value="' .$id. '">';
    echo '<input type="hidden" name="table" value="' .$table. '">';
    foreach ($row as $k => $v) {
      if($k != 'id'){
        echo '<div class="mb-3"><label for="'. $k .'">'. $k .' </label>';
      if($k != 'image'){
        echo '<input type="text" class="form-control form-control-lg" placeholder="' .$k . '" aria-label="' .$k . '" name="' .$k . '" value="'. $v . '"><br>';
      } else{
        echo '<input type="file" class="form-control form-control-lg" placeholder="' .$k . '" aria-label="' .$k . '" name="' .$k . '"value="'. $v . '><br>';
      }
        echo '</div>';
        echo "<br>";
      }
    }
    echo '<div class="text-center">
            <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0" name="submit">Submit</button>
          </div>
';
    echo "</form>";
  } else {
    echo "Error 404";
  }
}

?>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>


<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>
