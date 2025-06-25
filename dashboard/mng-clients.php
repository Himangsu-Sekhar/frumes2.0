<?php 
  include __DIR__ . '/../databasecon.php';
  if($_SERVER["REQUEST_METHOD"] == 'POST' ){
    if($_POST["form_type"] === 'testimonial'){
      $TNAME = $_POST['c_name'];
      $TFEED = $_POST['c_feed'];
      $TIMG = $_POST['c_link'];

      $Tsql = "INSERT INTO `testimonials` (`t_name`,`feedback`,`t_img`) VALUES ('$TNAME','$TFEED','$TIMG')";

      $Tresult = mysqli_query($con, $Tsql) OR die("querry error!");
      header("Location: " . $_SERVER['PHP_SELF']);
      exit();
      
    }elseif($_POST["form_type"] === 'brand'){

      $CBRAND = $_POST['bname'];
      $CURL = $_POST['burl'];
      $bsql = "INSERT INTO `brands` (`b_name`,`b_logo`) VALUES ('$CBRAND','$CURL')";

      $brasql = mysqli_query($con, $bsql);
      header("Location: " . $_SERVER['PHP_SELF']);
      exit();
    }
    
  }
  $Tf_sql = "SELECT * FROM `testimonials`";
  $Tf_result = mysqli_query($con, $Tf_sql) OR die("querry error!");

  $Br_sql = "SELECT * FROM `brands`";
  $Br_result = mysqli_query($con, $Br_sql) OR die("querry error!"); 
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Clients</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="/GPT/Assets/mainlogo.png">
  <style>
    .main-content {
      margin-left: 250px; /* Leave space for sidebar */
      padding: 20px;
    }
  </style>
</head>
<body>


<!-- Include Sidebar -->
<?php include 'sidebar.php'; ?>
<div class="d-flex ">

<!-- Main Content -->
<div class="container-fluid p-5">
  <h2>Manage Testimonials and Brands</h2>

  <!-- Testimonial Form -->
  <div class="card mb-4">
    <div class="card-header bg-secondary text-white">Add Testimonial</div>
    <div class="card-body">
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="hidden" name="form_type" value="testimonial">
        <div class="mb-3">
          <label for="clientName" class="form-label">Client Name</label>
          <input type="text" class="form-control" name="c_name" id="clientName" placeholder="Enter client name">
        </div>
        <div class="mb-3">
          <label for="testimonial" class="form-label">Testimonial</label>
          <textarea class="form-control" name="c_feed" id="testimonial" rows="3" placeholder="Client's feedback"></textarea>
        </div>
        <div class="mb-3">
          <label for="c-image" class="form-label">Image Link</label>
          <input type="text" class="form-control"  name="c_link" id="c-image" placeholder="Client image link">
        </div>
        <button type="submit" class="btn btn-success">Add Testimonial</button>
      </form>
    </div>
  </div> 

  <!-- Testimonials Table -->
  <div class="card mb-5">
    <div class="card-header bg-dark text-white">Client Testimonials</div>
    <div class="card-body">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Client Name</th>
            <th>Testimonial</th>
            <th>Actions</th>
          </tr>
        </thead>
        <?php while($row = mysqli_fetch_assoc($Tf_result)){ ?>
        <tbody>
          <tr>
            <td><?php echo $row['t_id']; ?></td>
            <td><img src="<?php echo $row['t_img']; ?>" class="rounded-circle mb-3" alt="Client 1" width="50" height="50"></td>
            <td><b><?php echo $row['t_name']; ?></b></td>
            <td><?php echo $row['feedback']; ?></td>
            <td><a href="../delete-inline-testi.php?id=<?php echo $row['t_id'];?>" class="btn btn-danger btn-sm">Delete</a></td>
          </tr>
        </tbody>
        <?php } ?>
      </table>
    </div>
  </div>
  <div class="card mb-4">

  <!-- Brand Form -->
    <div class="card-header bg-secondary text-white">Add Brand</div>
    <div class="card-body">
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="hidden" name="form_type" value="brand">
        <div class="mb-3">
          <label for="brandName" class="form-label">Brand Name</label>
          <input type="text" class="form-control" name="bname" id="brandName" placeholder="Enter brand name">
        </div>
        <div class="mb-3">
          <label for="brandLogo" class="form-label">Brand Logo URL</label>
          <input type="text" class="form-control" name="burl" id="brandLogo" placeholder="Enter logo URL">
        </div>
        <button type="submit" class="btn btn-success">Add Brand</button>
      </form>
    </div>
  </div>

  <!-- Brand Table -->
  <div class="card">
    <div class="card-header bg-dark text-white">Our Brands</div>
    <div class="card-body">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Brand Name</th>
            <th>Logo</th>
            <th>Actions</th>
          </tr>
        </thead>
        <?php while($row = mysqli_fetch_assoc($Br_result)){ ?>
        <tbody>
          <tr>
            <td><?php echo $row['b_id'];?></td>
            <td><?php echo $row['b_name'];?></td>
            <td><img src="<?php echo $row['b_logo']; ?>" class="rounded-circle mb-3" alt="Client 1" width="25" height="25"></td>
            <td><a href="../delete-inline-brands.php?id=<?php echo $row['b_id'];?>" class="btn btn-danger btn-sm">Delete</a></td>
          </tr>
        </tbody>
        <?php } ?>
      </table>
    </div>
  </div>

</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
