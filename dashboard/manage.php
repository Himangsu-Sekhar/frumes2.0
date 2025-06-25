<!-- manage-services.php -->
<?php 
    include __DIR__.'/../databasecon.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $S_TITLE = $_POST['s_title'];
      $S_ICON = $_POST['s_icon'];
      $S_PARA = $_POST['s_para'];
      
      if (!empty($S_TITLE) && !empty($S_ICON) && !empty($S_PARA)) {
        $svsql = "INSERT INTO `services` (`s_name`,`s_para`, `s_icon`) VALUES ('$S_TITLE','$S_PARA','$S_ICON')";
        $svres = mysqli_query($con, $svsql);
      }
      header("Location: " . $_SERVER['PHP_SELF']);
      exit();
      
    }
    
    $shsql = "SELECT * FROM `services`";
    $shresult = mysqli_query($con,$shsql);
    ?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Services</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link rel="icon" href="/GPT/Assets/mainlogo.png">
</head>
<body>
  <?php include 'sidebar.php'; ?>
<div class="d-flex">
  <div class="container-fluid p-5">
      <?php if (isset($_GET['error']) && $_GET['error'] == 'linked'): ?>
      <div class="alert alert-danger">❌ Cannot delete: Complete the Orders Before deleting the service!</div>
      <?php elseif (isset($_GET['deleted']) && $_GET['deleted'] == 'success'): ?>
    <div class="alert alert-success">✅ Service deleted successfully.</div>
    <?php endif; ?>

    <h2 class="mb-4">🛠 Manage Services</h2>

    <!-- Form -->
    <form class="row g-3 mb-4" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <div class="col-md-4">
        <input type="text" name = "s_title"  class="form-control" placeholder="Service Title" required>
      </div>
      <a class="link-opacity-50 link-primary link-underline-opacity-10 " target="_blank" href="https://www.w3schools.com/icons/icons_reference.asp"> Reference for icons </a>
      <div class="col-md-4">
        <input type="text" name = "s_icon" class="form-control" placeholder="Bootstrap Icon (e.g., fas fa-film)" required>
      </div>
      <div class="col-12">
        <textarea class="form-control" name = "s_para" rows="3" placeholder="Service Description" required></textarea>
      </div>
      <div class="col-md-2">
        <button class="btn btn-primary w-100">Add Service</button>
      </div>
    </form>

    <!-- Table -->
    <table class="table table-bordered">
      <thead class="table-light">
        <tr>
          <th>Icon</th>
          <th>Title</th>
          <th>Description</th>
          <th>Actions</th>
        </tr>
      </thead>
      <?php while($shrow = mysqli_fetch_assoc($shresult)){ ?>
      <tbody>
        <tr>
          <td><i class="<?php echo $shrow['s_icon']; ?>"></i></td>
          <td><?php echo $shrow['s_name']; ?></td>
          <td><?php echo $shrow['s_para']; ?></td>
          <td>
            <!-- <button class="btn btn-sm btn-warning">Edit</button> -->
            <a href="../delete-inline-services.php?id=<?php echo $shrow['s_id'];?>" class="btn btn-sm btn-danger">Delete</a>
          </td>
        </tr>
      </tbody>
      <?php } ?>
    </table>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
