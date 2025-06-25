<!-- dashboard.php -->
<?php 
  include __DIR__.'/../databasecon.php';
  $tordersql = "SELECT * FROM `orders`"; 
  $torder = mysqli_query($con, $tordersql);

  $pordersql = "SELECT * FROM `orders` WHERE `status` = 'pending'";
  $porder = mysqli_query($con,$pordersql);
  
  $cordersql = "SELECT * FROM `orders` WHERE `status` = 'completed'";
  $corder = mysqli_query($con,$cordersql);

?>







<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="/GPT/Assets/mainlogo.png">
</head>
<body>
  <?php include 'sidebar.php'; ?>
<div class="d-flex">
  <div class="container-fluid p-5">
    <h2>📊 Orders Summary</h2>
    <div class="row mt-4">
      <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
          <div class="card-body">
            <h5>Total Orders</h5>
            <p class="card-text fs-3"><?php echo mysqli_num_rows($torder); ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-white bg-warning mb-3">
          <div class="card-body">
            <h5>Pending Orders</h5>
            <p class="card-text fs-3"><?php echo mysqli_num_rows($porder); ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
          <div class="card-body">
            <h5>Completed Orders</h5>
            <p class="card-text fs-3"><?php echo mysqli_num_rows($corder); ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
