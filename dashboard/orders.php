<!-- pending-orders.php -->
<?php
  include __DIR__.'/../databasecon.php';
  
  $osql = "SELECT * FROM orders 
         JOIN services ON orders.service_id = services.s_id 
         ORDER BY 
           CASE 
             WHEN orders.status = 'Pending' THEN 0 
             WHEN orders.status = 'Completed' THEN 1 
             ELSE 2 
           END";
  $oresql = mysqli_query($con, $osql) OR die("querry unsuccessful!");
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pending Orders</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="/GPT/Assets/mainlogo.png">
</head>
<body>
  <?php include 'sidebar.php'; ?>
<div class="d-flex">
  <div class="container-fluid p-5">
    <h2 class="mb-4">📦 Pending Orders</h2>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Order ID</th>
          <th>Client</th>
          <th>Ph. No.</th>
          <th>Service</th>
          <th>Order</th>
          <th>Status</th>
          <th>Completed By</th>
          <th>Action</th>
        </tr>
      </thead>
      <?php while($orow = mysqli_fetch_assoc($oresql)){ ?>
      <tbody>
        <tr>
          <td>#<?php echo $orow['Order_id']; ?></td>
          <td><?php echo $orow['Name']; ?></td>
          <td><?php echo $orow['phone no.']; ?></td>
          <td><?php echo $orow['s_name']; ?></td>
          <td><?php echo $orow['description']; ?></td>
          <td><span class="badge <?php echo ($orow['status'] == 'Completed') ? 'bg-success' : 'bg-warning'; ?>"><?php echo $orow['status']; ?></span></td>
          <td><?php echo $orow['Completed_By']; ?></td>
          <td><a href="../update-inline-orders.php?id=<?php echo $orow['Order_id']; ?>" class="btn btn-sm btn-success">Mark as Completed</a></td>
        </tr>
      </tbody>
      <?php } ?>
    </table>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
