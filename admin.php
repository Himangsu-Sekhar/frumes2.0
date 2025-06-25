<?php
session_start();
include __DIR__."/databasecon.php"; // This file should contain your DB connection ($conn)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Encrypt input password using MD5

    // SQL query using mysqli_query
    $sql = "SELECT * FROM `admins` WHERE `a_name` = '$username' AND `password` = '$password'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        echo "Login successful. Welcome, " . htmlspecialchars($username) . "!";
        header("Location: http://{$hostname}/GPT/dashboard/dashboard.php");  

    } else {
        echo "<div class='alert alert-danger' >Invalid username or password. Go back and Refresh!. </div>";
    }
    mysqli_close($con);
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <!-- Bootstrap CSS CDN -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />
  <link rel="icon" href="/GPT/Assets/mainlogo.png">
</head>
<body class="bg-light">

  <div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
      <div class="col-md-6 col-lg-4">
        <div class="card shadow-lg rounded-4">
          <div class="card-body p-4">
            <h3 class="text-center mb-4">Login</h3>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
              <div class="mb-3">
                <label for="email" class="form-label">Username</label>
                <input
                  type="text"
                  class="form-control"
                  id="username"
                  name="username"
                  required
                />
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                  required
                />
              </div>
              <div class="d-grid">
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
              <!-- <div class="text-center mt-3">
                <small>Don't have an account? <a href="register.html">Register</a></small>
              </div> -->
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS CDN (Optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
